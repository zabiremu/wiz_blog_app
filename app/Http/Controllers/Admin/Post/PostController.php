<?php

namespace App\Http\Controllers\Admin\Post;

use stdClass;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::orderBy('id', 'DESC')->simplePaginate(5);
        $info = new stdClass();
        $info->page_title = 'All Posts';
        $info->form_edit = 'admin.posts.edit';
        $info->form_destroy = 'admin.posts.destroy';
        return view('admin.post.index', compact('data', 'info'));
    }
}
