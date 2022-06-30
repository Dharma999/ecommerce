<?php

namespace App\Http\Controllers\Admin\Product;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Support\ImageSupport;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\Product\Product;
use GrahamCampbell\ResultType\Success;
use App\Models\Admin\Category\Category;
use App\Models\Admin\Product\Size\ProductSize;
use App\Models\Admin\Product\ProductImage\ProductImage;
use App\Models\Admin\Product\FeaturedImage\FearuredImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder_name = 'backend.product.';
    protected $product, $productImage, $featuredImaage, $productSize, $imageSupport;

    function __construct(Product $product, ProductImage $productImage, FearuredImage $featuredImaage, ProductSize $productSize, ImageSupport $imageSupport,)
    {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->featuredImaage = $featuredImaage;
        $this->productSize = $productSize;
        $this->imageSupport = $imageSupport;
    }

    public function index()
    {
        $products = Product::all();
        $data = [
            'products' => $products,
        ];
        return view($this->folder_name . 'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
        ];
        return view($this->folder_name . 'form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $input = $request->all();

        $input['category_id'] = $request->category;
        $input['user_id'] = \Auth::id();

        $slugable = $request->title . rand(00000, 99999);
        $input['slug'] = Str::slug($slugable);

        DB::beginTransaction();


        try {
            //product saved successfully
            $product = $this->product->create($input);



            //sizes of product
            $sizes = $request->size;
            $sizes = explode(',', $sizes);

            foreach ($sizes as $size) {
                $this->productSize->create([
                    'product_id' => $product->id,
                    'size' => $size,
                ]);
            }
            //sizes saved successfully

            //featured images
            foreach ($request->featuredImage as $image) {
                $img_name = $this->imageSupport->saveGallery($image, 'products', 250, 250);
                $this->featuredImaage->create([
                    'product_id' => $product->id,
                    'image' => $img_name,
                ]);
            }
            //featured images saved successfully


            //productcolor or color image from herer
            $colors = $request->color;
            $colors = explode(',', $colors);

            foreach ($request->colorImage as $index => $image) {
                $img_name = $this->imageSupport->saveGallery($image, 'products', 250, 250);
                $this->productImage->create([
                    'product_id' => $product->id,
                    'image' => $img_name,
                    'color' => $colors[$index],
                ]);
            }
            DB::commit();
            Toastr::success('Successfully Saved', 'Success !!!', ['positionClass'=>'toast-top-right']);
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::Warning($th->getMessage(), 'Oops !!!', ['positionClass'=>'toast-top-right']);
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $sizes = $product->sizes->pluck('size')->toArray();
        $newSizes = implode(',', $sizes);
        $colors = $product->product_images->pluck('color')->toArray();
        $newColors = implode(',', $colors);

        $data = [
            'product' => $product,
            'categories' => Category::all(),
            'sizes' => $newSizes,
            'colors' => $newColors,
        ];
        return view($this->folder_name . 'form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $input['category_id'] = $request->category;
        $input['user_id'] = \Auth::id();

        $slugable = $request->title . rand(00000, 99999);
        $input['slug'] = Str::slug($slugable);


        DB::beginTransaction();

         try {
            $this->product = $product;
            $this->product->update($input);
            //Prodduct saved succesfully


            $this->product->sizes()->delete(); //sizes deleted old size

            //new sizes saved successfully
            $sizes = $request->size;
            $sizes = explode(',', $sizes);

            foreach ($sizes as $size) {
                $this->productSize->create([
                    'product_id' => $this->product->id,
                    'size' => $size,
                ]);
            }
            //Sizes Saved succesfully


            //Featured Image
            if ($request->file('featuredImage') !== null) {
                $this->product->featured_images()->delete();
                foreach ($request->featuredImage as $image) {
                    $img_name = $this->imageSupport->saveGallery($image, 'products', 250, 250);
                    $this->featuredImaage->create([
                        'product_id' => $product->id,
                        'image' => $img_name,
                    ]);
                }
            }
            //Featured images saved successfully

            //Product Image
            //color
            $colors =$request->color;
            $colors = explode(',', $colors);

            if ($request->file('image') !== null) {
                $this->product->image->delete();
            foreach ($request->productImage as $index => $images) {
                $img_name = $this->imageSupport->saveGallery($image, 'products', 250, 250);
                $this->productImage->create([
                    'product_id' => $product->id,
                    'image' => $img_name,
                    'color' => $colors[$index],
                ]);
            }
            }

            DB::commit();
        Toastr::success('Successfully updated', 'Success !!!', ['positionClass'=>'toast-top-right']);
        return redirect()->route('product.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->sizes()->delete();
        $product->product_images()->delete();
        $product->featured_images()->delete;
        return redirect()->route('product.index');
    }
}
