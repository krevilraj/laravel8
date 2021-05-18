<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(20);

        //table html
//        return view('admin.slider.index')->with(['sliders'=>$sliders]);
        return view('admin.client.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status == "on"){
            $status = true;
        }else{
            $status = false;
        }


        //use of function

        $path = $this->uploadFeaturedImage($request->image);




        $slider = Slider::create([
            'title' => $request->title,
            'link' => $request->link,
            'subtitle' => $request->subtitle,
            'image' => $path,
            'status' => $status,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Slider updated successfully !');
    }

    public function uploadFeaturedImage($featured_image)
    {
//        $path = Storage::put('slider', $featured_image);
//        return $path;



        $imageName = time().'.'.$featured_image->extension();

        $featured_image->move(public_path('slider'), $imageName);

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
        $slider = Slider::find($id);
        return view('admin.client.edit-form',compact('slider'));
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
        $id = $request->id;
        $slider = Slider::find($id);

        if($request->status == "on"){
            $status = true;
        }else{
            $status = false;
        }

        // if naya image xa vane
        if($request->image){
            //pahila ko image delete ani naya upload
           // Storage::delete('public/', $slider->image);
            $file_path = public_path().'/slider/'.$slider->image;
            if(File::exists($file_path)){
//                unlink($file_path);
                // Storage::delete('public/', $slider->image);
            }
            // nay image upload
            $path = $this->uploadFeaturedImage($request->image);

        }else{
            $path = $slider->image;
        }


        $slider = $slider->update([
            'title' => $request->title,
            'link' => $request->link,
            'subtitle' => $request->subtitle,
            'image' => $path,
            'status' => $status
        ]);

        return redirect()->to('/admin/client')->with('success', 'Slider updated success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id); //jun click tehi slider ho

        Storage::delete('public/', $slider->image);

        $slider->delete();
        return redirect()->back()->with('success', 'Slider deleted successfully !');
    }
}
