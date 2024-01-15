<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory as Category;
use Illuminate\Http\Request;

class AssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('tools')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create($request->except('_token', '_method'));

        alert()->success('Berhasil!', 'Kategori Alat Telah Berhasil Disimpan!');

        return redirect()->route('tools.categories.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('_method', '_token'));
        alert()->success('Berhasil!', 'Kategori Alat Telah Berhasil Dirubah!');

        return redirect()->route('tools.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        alert()->success('Berhasil!', 'Kategori Alat Telah Berhasil Dihapus!');

        return redirect()->route('tools.categories.index');
    }
}
