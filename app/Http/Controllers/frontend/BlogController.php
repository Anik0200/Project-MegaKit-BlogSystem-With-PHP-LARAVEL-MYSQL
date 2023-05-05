<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(4);

        return view('frontend.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {

            return 'CANT FIND';
        }

        $comments = Comment::where('post_id', $post->id)->Paginate(2);

        $latestPosts = Post::where('id', '!=', $post->id)->latest()->limit(5)->get();

        $tags = $post->tags;

        return view('frontend.single', compact('post', 'comments', 'latestPosts', 'tags'));
    }

    public function tagsPost($id)
    {

        $tags = Tag::find($id);

        if (!$tags) {

            return 'CANT FIND';
        }

        $allPosts = $tags->posts;

        return view('frontend.tagsPost', compact('allPosts', 'tags'));
    }

    public function postSerch(Request $request)
    {
        $search = $request->search;

        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(4);

        return  view('frontend.search', compact('posts'));
    }
}
