<?php

namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\Banner\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    protected $folderName = 'backend.banner.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $banners = Banner::all();

        $data = [
            'banners' => $banners,
        ];
        
        return view($this->folderName.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view($this->folderName.'form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {

        $input = $request->all();


        $imageSupport = new ImageSupport();
        $image_name = $imageSupport->saveAnyImg($request, 'banner', 'image', 1080, 720);
        $input['image'] = $image_name;


        $banners = new Banner();
        $banners->create($input);

        return redirect()->route('banner.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $data = [
            'banner' => $banner,
        ];
        return view($this->folderName.'form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $input = $request->all();
        

      if (!$request->file('imaeg')==null){
        
        $imageSupport = new ImageSupport();
        $image_name = $imageSupport->saveAnyImg($request, 'banner', 'image', 1080, 720);
        $input['image'] = $image_name;

      }


        $banner->update($input);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index');
    }
}
