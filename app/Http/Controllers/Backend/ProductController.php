<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);

        //table html
//        return view('admin.slider.index')->with(['sliders'=>$product]);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.form',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image_path = $this->uploadFeaturedImage($request->image);
        $size_path = $this->uploadFeaturedImage($request->size_chart);
        $attributes = $request->all();
        $attributes['image'] = $image_path;
        $attributes['size_chart'] = $image_path;

        $product = Product::create($attributes);

        $cat = $request->cat;

        foreach($cat as $cat_id){
            CategoryProduct::create([
                'category_id'=> $cat_id,
                'product_id' => $product->id
            ]);
        }






        return redirect()->back()->with('success', 'Product updated successfully !');
    }

    public function uploadFeaturedImage($featured_image)
    {
//        $path = Storage::put('slider', $featured_image);
//        return $path;

        $imageName = time().'.'.$featured_image->extension();

        $featured_image->move(public_path('product'), $imageName);

        return $imageName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
