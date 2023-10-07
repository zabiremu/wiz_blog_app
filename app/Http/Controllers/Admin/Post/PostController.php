<?php

namespace App\Http\Controllers\Admin\Post;

use stdClass;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::with('users', 'categories')->orderBy('id', 'DESC')->simplePaginate(5);
        // dd($data);
        $info = new stdClass();
        $info->page_title = 'All Posts';
        $info->form_create = 'admin.posts.create';
        $info->form_edit = 'admin.posts.edit';
        $info->form_show = 'admin.posts.show';
        $info->form_destroy = 'admin.posts.destroy';
        return view('admin.post.index', compact('data', 'info'));
    }

    public function create()
    {
        $info = new stdClass();
        $info->page_title = 'Create Posts';
        $info->form_store = 'admin.posts.store';
        $categories = Category::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.post.create', compact('info', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'details' => 'required|string',
            'category_id' => 'required|integer',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        $row = new Post();
        $row->category_id = $request->category_id;
        $row->title = $request->title;
        $row->details = $request->details;
        $row->status = $request->status;
        $row->user_id = auth()->user()->id;
        if ($request->hasFile('thumbnail')) {
            $saveUrl = saveImage($request->thumbnail, 'thumbnail');
            $row->thumbnail = $saveUrl;
        }
        $row->save();
        return redirect()->route('admin.posts.index')->with('success', 'Post Successfully Created');
    }

    public function edit($id)
    {
        $info = new stdClass();
        $info->page_title = 'Edit Posts';
        $info->form_update = 'admin.posts.update';
        $categories = Category::where('status', 1)->orderBy('id', 'DESC')->get();
        $row = Post::where('id', $id)->first();
        return view('admin.post.create', compact('info', 'categories', 'row'));
    }

    public function show($id)
    {
        $info = new stdClass();
        $info->page_title = 'Show Posts';
        $row = Post::with('users', 'categories')->where('id', $id)->first();
        return view('admin.post.view', compact('info', 'row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'details' => 'required|string',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $row = Post::where('id', $id)->first();
        $row->category_id = $request->category_id;
        $row->title = $request->title;
        $row->details = $request->details;
        $row->status = $request->status;
        $row->user_id = auth()->user()->id;
        if ($request->hasFile('thumbnail')) {
            $data = Post::where('id', $id)->first();
            $explode = explode('/', $data->thumbnail);
            $end = end($explode);
            $oldImageName = $end;
            $path = 'thumbnail/' . $oldImageName;
            $saveUrl = updateImage($path, $request->thumbnail, 'thumbnail');
            $data->thumbnail = $saveUrl;
            $data->save();
        }
        $row->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post Successfully Updated');
    }

    public function destroy($id)
    {
        $data = Post::find($id);
        $explode = explode('/', $data->thumbnail);
        $end = end($explode);
        $oldImageName = $end;
        $path = 'thumbnail/' . $oldImageName;
        destroy($path);
        Post::where('id', $id)->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post Successfully Deleted');
    }
}
