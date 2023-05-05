<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request, $postId)
    {

        $request->validate(
            [
                'comment' => 'required|string'
            ],

            [
                'comment.required' => "PLEASE TYPE SOMETHING",
                'comment.string'   => "ONLY TEXT"
            ]
        );

        // ===========================
        if (auth()->check()) {

            $post = Post::find($postId);

            // ===========================
            if (!$post) {

                return back()->with('error', 'PLEASE REFRESH THE PAGE!');
            }

            // ===========================

            $create = Comment::create([

                'user_id' => auth()->id(),
                'post_id' => $postId,
                'comment' => $request->comment

            ]);
        }
        // ===========================

        // ===========================
        if ($create) {
            return back()->with('success', 'COOMENT CREATED');
        }
        // ===========================
    }

    public function commentReply(Request $request, $commentId)
    {
        if (!$commentId) {

            return back()->with('error', 'PLEASE REFRESH THE PAGE!');
        }

        CommentReply::create([

            'comment_id' => $commentId,
            'user_id'    => auth()->id(),
            'comment'    => $request->comment,

        ]);

        return back();
    }

    public function commentReplydelete($commentId)
    {
        $replyComment = CommentReply::find($commentId);

        if (!$replyComment) {

            return back()->with('error', 'PLEASE REFRESH THE PAGE!');
        }

        $replyComment->delete();

        return back();
    }
}
