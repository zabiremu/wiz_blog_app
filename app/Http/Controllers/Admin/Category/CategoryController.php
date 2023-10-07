<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use stdClass;

class CategoryController extends Controller
{
    public function index()
    {
        $data = DB::table('categories')->orderBy('id', 'DESC')->get();
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

        $expect_columns = json_decode('["_token"]', true);
        $row = DB::table('categories')->insert($request->except($expect_columns));
        return redirect()->route('admin.category.index')->with('success', 'Category Successfully Created');
    }

    public function edit($id)
    {
        $data = DB::table('categories')->orderBy('id', 'DESC')->get();
        $info = new stdClass();
        $info->page_title = 'Create Category';
        $info->all_data = 'All Categories';
        $info->form_update = 'admin.category.update';
        $info->form_edit = 'admin.category.edit';
        $info->form_destroy = 'admin.category.destroy';
        $row = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.index', compact('data', 'info', 'row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:80',
            'slug' => 'required|string|max:80',
        ]);

        $expect_columns = json_decode('["_token","_method"]', true);
        $row = DB::table('categories')->where('id', $id)->update($request->except($expect_columns));
        return redirect()->route('admin.category.index')->with('success', 'Category Successfully Updated');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category Successfully Deleted');
    }
}
