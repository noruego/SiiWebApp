<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ApiCategoryController extends Controller
{
    //
    public function  index()
    {
        $category = Category::all();
        json_encode($category);
        return $category;
    }

    public function show($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
    }

    public function easyUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
