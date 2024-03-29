<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetCategory;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->wantsJson()) {
            $assets     = Asset::with('category')->get();
            return response()->json($assets->toArray());
        }
        $assets     = Asset::with('category')->get();
        $categories = AssetCategory::all();
        return view('asset.index', compact('assets', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => ['required'],
            'category_id'     => ['required'],
            'size'            => ['required'],
            'price'           => ['required'],
            'stock'           => ['required'],
            'additional_info' => ['nullable'],
        ]);

        $asset = Asset::create($request->except('_method'));

        alert()->success('Berhasil!', 'Alat Telah Berhasil Disimpan!');

        return redirect()->route('tools.index');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $tool)
    {
        $request->validate([
            'name'            => ['required'],
            'category_id'     => ['required'],
            'size'            => ['required'],
            'price'           => ['required'],
            'stock'           => ['required'],
            'additional_info' => ['nullable'],
        ]);

        $tool->update($request->except('_method','_token'));

        alert()->success('Berhasil!', 'Alat Telah Berhasil Dirubah!');

        return redirect()->route('tools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $tool)
    {
        $tool->delete();

        alert()->success('Berhasil!', 'Alat Telah Berhasil Dihapus!');

        return redirect()->route('tools.index');
    }
}
