<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\User;
use App\Models\UserPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        $user = User::create([
            'name' => "rajkumar123",
            'email' => "rajkumar123124124",
            'password' => "asdfdfasdf"
        ]);
        $user_phone = UserPhone::create([
            'user_id' => $user->id,
            'phone' => "92835293"
        ]);

    }

    public function user_slider()
    {
        $user = Auth::user();

        $sliders = $user->sliders()->paginate(20);

        //table html
//        return view('admin.slider.index')->with(['sliders'=>$sliders]);
        return view('admin.user.index',compact('sliders'));

    }
}
