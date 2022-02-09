<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    /*function (Illuminate\Http\Request $request) {
        $request->file('photo')->store('profiles');
        return redirect('profile');
    }*/

    public function upload(Request $request){
        $request->validate([
            'photo' => 'required'
        ]);
        $request->file('photo')->store('profiles');
        return redirect('profile');
    }
}
