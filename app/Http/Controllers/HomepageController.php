<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Configuration;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sliders = Slider::active();

        $new_arrival = Product::latest()->take(8)->get();

        $best_seller = CategoryProduct::where('category_id',1)->get();
        $seller_item = CategoryProduct::where('category_id',2)->get();

        return view('front.home',compact('sliders','new_arrival','best_seller'));
    }

}
