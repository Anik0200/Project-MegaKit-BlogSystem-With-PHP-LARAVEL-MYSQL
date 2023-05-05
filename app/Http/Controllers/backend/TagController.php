<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withTrashed()->paginate(5);
        return view('backend.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tag.create');
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

        Tag::create([

            'name' => $request->name

        ]);

        return redirect(route('tag.index'))->with('success', 'TAG CREATE SUCCESSFULL');
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
        $tag = Tag::find($id);
        return view('backend.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::find($id);

        $tag->update([
            'name' => $request->name
        ]);

        return redirect(route('tag.index'))->with('success', 'TAG UPDATE SUCCESSFULL');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        return redirect(route('tag.index'))->with('success', 'YOU CAN RETRIVE!');
    }

    public function retrive($id)
    {
        $tag = Tag::onlyTrashed()->find($id);

        $tag->update([
            'deleted_at' => null
        ]);

        return redirect(route('tag.index'))->with('success', 'RETRIVE SUCCESSFULL!');
    }

    public function permaDel($id)
    {
        $tag = Tag::onlyTrashed()->find($id);
        $tag->forceDelete();
        return redirect(route('tag.index'))->with('success', 'PERMANENTLY DELETED!');
    }
}
