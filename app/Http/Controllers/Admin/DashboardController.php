<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $activeCategories = Category::where('status', 1)->count();
        $activePost = Post::where('status', 1)->count();
        $inActiveCategories = Category::where('status', 0)->count();
        $inActivePost = Post::where('status', 0)->count();
        return view('admin.dashboard',compact('activeCategories','activePost','inActiveCategories','inActivePost'));
    }
}
