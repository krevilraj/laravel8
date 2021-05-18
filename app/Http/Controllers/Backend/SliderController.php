<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){


        $sliders = Slider::latest()->paginate(2);

        //table html
//        return view('admin.slider.index')->with(['sliders'=>$sliders]);
        return view('admin.slider.index',compact('sliders'));
    }



    public function create(){

        // return view
        return view('admin.slider.form');
    }
    public function store(Request $request){
        //first way
//        $attributes = $request->all();
//        $attributes['full_name'] = $request->first_name.' '. $request->last_name;
//        $slider = Slider::create($request->all());


        //second way
//        $slider = new Slider();
//        $slider->title = $request->title;
//        $slider->link = $request->link;
//        $slider->subtitle = $request->subtitle;
//        $slider->full_name = $request->first_name.' '. $request->last_name;
//        $slider->save();

        // third way
        $slider = Slider::create([
            'title' => $request->title,
            'link' => $request->link,
            'subtitle' => $request->subtitle,
        ]);

        return redirect()->back()->with('success', 'Slider updated successfully !');

    }

    public function edit($id){
        // Select * from slider where id = $id
        $slider = Slider::find($id);
        return view('admin.slider.edit-form',compact('slider'));

    }

    public function update(Request $request){


        //first way
        /*$id = $request->id;
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->link = $request->link;
        $slider->save();*/

        //second way

        $id = $request->id;
        $slider = Slider::find($id);
        $slider = $slider->update($request->all());

        //third way
        $id = $request->id;
        $slider = Slider::find($id);
        $slider = $slider->update([
            'title' => $request->title,
            'link' => $request->link,
            'subtitle' => $request->subtitle,
        ]);

//        return redirect()->to('/admin/slider/index')->with('success', 'Slider updated successfully !');
        return redirect()->back()->with('success', 'Slider updated successfully !');
    }
    public function destroy($id){
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully !');
    }

    public function test($university,$college){
        echo $college;
    }
}
