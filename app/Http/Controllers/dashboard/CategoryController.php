<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(50);

        return view('dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];

        }//end of for each

        $request->validate($rules);


        Category::create($request->all());
        return    redirect()->route('dashboard.categories.index')->with('success', __('site.add_seccessfully'));
    }


    public function edit(Category $category)
    {

        return view('dashboard.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')]];

        }//end of for each

        $request->validate($rules);

        $category->update($request->all());

        return    redirect()->route('dashboard.categories.index')->with('success', __('site.edit_seccessfully'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', __('site.delete_seccessfully'));
    }
}
