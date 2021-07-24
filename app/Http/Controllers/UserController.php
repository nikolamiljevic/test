<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function profile() {

        $blogs = Blog::with('comments')->where('user_id',Auth::user()->id)->get();

        return view('profile',compact('blogs'));
    }

}
