<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Comment;
use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:255',
            'user_id' => 'required',
            'blog_id' => 'required'
        ]);

        $request->user()->comment()->create([
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id
        ]);

        return redirect()->route('blog.show', ['blog' => $request->blog_id]);
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('blog.show', ['blog' => $comment->blog_id]);
    }

    public function getComments(Blog $blog): View
    {
        $comments = Comment::all()->where('blog_id', $blog->id);

        return view('blog.viewBlog', [
            'comments' => $comments
        ]);
    }
}
