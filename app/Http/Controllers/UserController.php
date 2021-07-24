<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile($userId) {
        dd($userId);
        return view('profile');
    }

}
