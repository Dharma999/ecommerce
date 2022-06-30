<?php
namespace App\Http\Controllers\FrontendBlog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner\Banner;
use App\Models\Admin\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendBlogContoller extends Controller
{
    //
    protected $folderName='frontend.';
    public function index()
    {
        //  \Auth::logout();
        $banner = Banner::where('status', 'active')->orderByDesc('created_at')->first();
        $blogs = Blog::where('status', 'active')->orderByDesc('created_at')->get();
        $data=[
            'banner'=>$banner,
            'blogs'=>$blogs,
        ];
        return view($this->folderName.'index', $data);
    }


    public function getSingleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $data = [
            'blog' => $blog,
        ];
        return view('frontend.post', $data);
    
    }

    public function about() {
       return view($this->folderName.'about');
    }


    public function contact() {
        return view($this->folderName.'contact');
    }

    
    public function sendMail(Request $request)
    {
        // return $request;
        $data = $request->all();
        // $setting = Setting::find(1);
        // return $setting;
        $data['from']=$request->email;
        $data['email']='dangaura.tejendra.123@gmail.com';
        $data['content']=$request->message;
        // $data['email']=$setting->email;
        Mail::send('frontend.contact.send-mail', $data, function ($message) use ($data){
            $message->from($data['from']);
            $message->subject('This is for test');
            $message->to($data['email']);
        });
        return redirect('/');
    }
}
