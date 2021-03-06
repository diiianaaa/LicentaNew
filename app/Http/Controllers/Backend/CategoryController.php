<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function CategoryView()
    {

        $category = Category::latest()->get();
        return view('backend.category_view', compact('category'));
    }

    public function CategoryStore(Request $request)
    {

        $request->validate([
            'category_name_en' => 'required',
            'category_name_ger' => 'required',
        
        ], [
            'category_name_en.required' => 'Input Category English Name',
            'category_name_ger.required' => 'Input Category German Name',
        ]);



        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ger' => $request->category_name_ger,
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_ger' => str_replace('', '-', $request->category_name_ger),
          

        ]);


        return redirect()->route('all.category');
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ger' => $request->category_name_ger,
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_ger' => str_replace('', '-', $request->category_name_ger),
          

        ]);
        return redirect()->route('all.category');
    }

    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();

        return redirect()->route('all.category');
   
    }
}
