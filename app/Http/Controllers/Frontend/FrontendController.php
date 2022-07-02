<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner\Banner;
use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    //
    protected $folderName='frontend.';
    public function index()
    {
        //  \Auth::logout();

        $products = Product::where('status', 'active')->orderByDesc('created_at')->get();

        $data=[
            'products' => $products,
        ];
        return view($this->folderName.'index', $data);
    }


    public function shopView() {
        $products = Product::all();

        $data = [
            'products' => $products,
        ];
        return view('frontend.shop', $data);
    }


    public function product_details($slug)

    {
        $product = Product::where('slug', $slug)->first();
        $data = [
            'product' => $product,
        ];

        return view($this->folderName.'product_details', $data);
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
