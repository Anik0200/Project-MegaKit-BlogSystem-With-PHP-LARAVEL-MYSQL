<?php

namespace App\Http\Controllers\backend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

use function PHPUnit\Framework\fileExists;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withTrashed()->paginate(5);
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(

            [
                'title'          => 'required|max:256',
                'description'    => 'required|max:256',
                'status'         => 'required',
                'category'       => 'required',
                'tags'           => 'required',
                'file'           => 'required|mimes:png,jpg,jpeg',

            ],

            [
                'title.required'          => "TITLE IS REQUIRED",
                'title.max'               => "MAX 256 CHAE",
                'description.required'    => "DESCRIPTION IS REQUIRED",
                'description.max'         => "MAX 256 CHAE",
                'status.required'         => "STATUS IS REQUIRED",
                'category.required'       => "CATEGORY IS REQUIRED",
                'tags.required'           => "TAGS IS REQUIRED",
                'file.required'           => "IMAGE IS REQUIRED",
                'file.mimes'              => "CHOSE VALID IMGAE",
            ]

        );

        $file = $request->file;

        if ($file) {

            $fileName = time() . '_' . $file->getClientOriginalName();

            Image::make($file)->resize(540, 400)->save(public_path('/storage/backend/posts/' .

                $fileName));

            $gallery = Gallery::create([

                'image' =>  $fileName,
                'type'  =>  Gallery::POST_IMAGE,

            ]);

            $post =  Post::create([
                'user_id'      => auth()->id(),
                'category_id'  => $request->category,
                'title'        => $request->title,
                'description'  => $request->description,
                'status'       => $request->status,
                'gallery_id'   => $gallery->id,

            ]);

            foreach ($request->tags as $tag) {

                $post->tags()->attach($tag);
            }
        }

        return redirect(route('post.index'))->with('success', "POST CREATE SUCCESSFULL!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        return view('backend.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        $request->validate(

            [
                'title'          => 'max:256',
                'description'    => 'max:256',
                'file'           => 'mimes:png,jpg,jpeg|',
            ],

            [
                'title.max'               => "MAX 256 CHAE",
                'description.max'         => "MAX 256 CHAE",
                'file.mimes'              => "CHOSE VALID IMGAE",
            ]

        );


        $galleryId = $post->gallery_id;

        $getImage = Gallery::find($galleryId);

        $file = $request->file;

        if ($file) {

            $fileName = rand() . '_' . $file->getClientOriginalName();

            $upload = Image::make($file)->resize(540, 400)->save(public_path('/storage/backend/posts/' .

                $fileName));

            if ($upload) {
                unlink(public_path('storage/backend/posts/') . $post->gallery->image);
            }

            $getImage->update([
                'image' =>  $fileName,
                'type'  =>  Gallery::POST_IMAGE,
            ]);
        }

        $post->update([

            'category_id'  => $request->category,
            'title'        => $request->title,
            'description'  => $request->description,
            'status'       => $request->status,
            'gallery_id'   => $getImage->id,

        ]);

        $post->tags()->sync($request->tags);

        return redirect(route('post.index'))->with('success', "POST CREATE SUCCESSFULL!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect(route('post.index'))->with('success', "POST CAN BE RETRIVE!");
    }

    public function retrive(string $id)
    {

        $post = Post::onlyTrashed()->find($id);

        $post->update([
            'deleted_at' => null
        ]);

        return redirect(route('post.index'))->with('success', "POST UNDO DELETE!");
    }

    public function permaDel($id)
    {
        $post = Post::onlyTrashed()->find($id);

        $file =  public_path('storage/backend/posts/') . $post->gallery->image;

        if (fileExists($file)) {

            $galleryId = $post->gallery_id;

            $getImage = Gallery::find($galleryId);

            $getImage->delete();

            unlink(public_path('storage/backend/posts/') . $post->gallery->image);
            $post->forceDelete();
        }



        return redirect(route('post.index'))->with('success', "POST PERMANENTLY DELETE!");
    }
}
