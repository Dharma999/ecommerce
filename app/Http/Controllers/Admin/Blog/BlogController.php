<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\Blog\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $foldername = 'backend.blog.';
     
    public function index()
    {
        $blog = Blog::all();
        $data = [
            'blogs' => $blog,
        ];

        return view($this->foldername.'index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->foldername.'form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $input = $request->all();


        $imageSupport = new ImageSupport();
        $image_name = $imageSupport->saveAnyImg($request, 'blog', 'image', 1080, 720);
        $input['image'] = $image_name;

        $input['slug']=Str::slug($request->title);

        $input['user_id']=\Auth::id();

        
        $blog = new Blog();
        $blog->create($input);

        return redirect()->route('blog.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $data = [
            'blog' => $blog,
        ]; 

        return view($this->foldername.'form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {


        $input = $request->all();
        $input['slug']=Str::slug($request->title);


        if(!$request->file('image')==null){
            $imageSupport = new ImageSupport();
            $image_name  = $imageSupport->saveAnyImg($request, 'blog', 'image', 1080, 720);
            $input ['image'] = $image_name;
    
        }
       
        $blog->update($input);
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Blog\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

       $blog->delete();
       return redirect()->route('blog.index');
    }
}
