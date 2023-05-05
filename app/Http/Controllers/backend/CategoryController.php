<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::withTrashed()->paginate(5);

        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(

            [
                'name' => 'required|max:100',
            ],

            [
                'name.required' => "THIS FIELD IS REQUiRED"
            ]
        );


        Category::create([
            'name' => $request->name
        ]);

        return redirect(route('category.index'))->with('success', 'CATEGORY CREATE SUCCESSFULL');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(

            [
                'name' => 'required|max:100',
            ],

            [
                'name.required' => "THIS FIELD IS REQUiRED"
            ]
        );

        $category = Category::find($id);

        $category->update([

            'name' => $request->name

        ]);

        return redirect(route('category.index'))->with('success', 'CATEGORY UPDATE SUCCESSFULL');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect(route('category.index'))->with('success', 'YOU CAN RETRIVE!');
    }

    public function retrive($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->update([
            'deleted_at' => null
        ]);

        return redirect(route('category.index'))->with('success', 'RETRIVE SUCCESSFULL!');
    }

    public function permaDel($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();
        return redirect(route('category.index'))->with('success', 'PERMANENTLY DELETED!');
    }
}
