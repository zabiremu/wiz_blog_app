<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function home()
    {
        $data = Post::with('users', 'categories')->where('status',1)->orderBy('id', 'DESC')->simplePaginate(5);
        return view('frontend.home',compact('data'));
    }
    public function show($id)
    {
        $data = Post::with('users', 'categories')->where('id',$id)->orderBy('id', 'DESC')->first();
        return view('frontend.show',compact('data'));
    }
}
