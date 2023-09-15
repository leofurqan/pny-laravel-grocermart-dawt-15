<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function categories() {
        $categories = Categories::all();
        return view('admin.categories.list')->with('categories', $categories);
    }

    public function add() {
        return view('admin.categories.add');
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required'
        ]);

        $category = new Categories;
        $category->name = $request->input('category_name');
        $category->description = $request->input('category_description');
        $category->isActive = $request->input('category_status') ? "1" : "0";
        $category->save();
        Session::flash('message', "Category Added Successfully");

        return redirect('/admin/categories');
    }

    public function edit(Request $request) {
        $category_id = $request->id;
        $category = Categories::find($category_id);

        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request) {
        $category_id = $request->id;
        $category = Categories::find($category_id);

        $category->name = $request->input('category_name');
        $category->description = $request->input('category_description');
        $category->isActive = $request->input('category_status') ? "1" : "0";
        $category->save();
        Session::flash('message', "Category Updated Successfully");

        return redirect('/admin/categories');
    }

    public function delete(Request $request) {
        Categories::where('id', $request->id)->delete();

        Session::flash('message', "Category Deleted Successfully");
        return redirect('/admin/categories');
    }
}
