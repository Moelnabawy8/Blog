<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewCommentNotification;

class CommentController extends Controller
{
    

public function store(Request $request, $post_id)
{
    $validated = $request->validate([
        'content' => 'required|string'
    ]);

    $post = Post::findOrFail($post_id);

    $comment = $post->comments()->create([
        'content' => $validated['content'],
        'user_id' => auth()->id(),
    ]);

    $post->user->notify(new NewCommentNotification($comment));

    return back()->with('success', 'Comment added successfully!');
}



    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
