<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use stdClass;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('id', 'DESC')->simplePaginate(5);
        $info = new stdClass();
        $info->page_title = 'Create Category';
        $info->all_data = 'All Categories';
        $info->form_store = 'admin.category.store';
        $info->form_edit = 'admin.category.edit';
        $info->form_destroy = 'admin.category.destroy';
        return view('admin.category.index', compact('data', 'info'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:80|unique:categories,title',
            'slug' => 'required|string|max:80|unique:categories,slug',
        ]);

        $row = new Category();
        $row->title = $request->title;
        $row->slug = $request->slug;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.category.index')->with('success', 'Category Successfully Created');
    }

    public function edit($id)
    {
        $data = Category::orderBy('id', 'DESC')->simplePaginate(5);
        $info = new stdClass();
        $info->page_title = 'Create Category';
        $info->all_data = 'All Categories';
        $info->form_update = 'admin.category.update';
        $info->form_edit = 'admin.category.edit';
        $info->form_destroy = 'admin.category.destroy';
        $row = Category::where('id', $id)->first();
        return view('admin.category.index', compact('data', 'info', 'row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:80',
            'slug' => 'required|string|max:80',
        ]);

        $row = Category::where('id', $id)->first();
        $row->title = $request->title;
        $row->slug = $request->slug;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.category.index')->with('success', 'Category Successfully Updated');
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category Successfully Deleted');
    }
}
