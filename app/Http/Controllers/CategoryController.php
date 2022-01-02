<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_category()
    {
        return view('dashboard.main_dashboard.add_category');
    }
    public function add_category(Request $request)
    {
        $category = new Category;

        $category->nama_kategori = $request->name_category;

        $category->save();

        // dd($category);

        return redirect()->back();
    }
}
