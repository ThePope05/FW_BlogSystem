<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::all()->where('user_id', auth()->user()->id);

        return view('blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required'
        ]);

        $request->user()->blog()->create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('blog.index');
    }

    public function edit(Blog $blog): View
    {
        return view('blog.create', [
            'blog' => $blog
        ]);
    }

    public function all(): View
    {
        $blogs = Blog::all()->where('user_id', '!=', auth()->user()->id);

        return view('blog.overview', [
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog): View
    {
        return view('blog.viewBlog', [
            'blog' => $blog,
            'comments' => $blog->comment
        ]);
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required'
        ]);

        $blog->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('blog.index');
    }

    public function create(): View
    {
        return view('blog.create');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->comment()->delete();
        $blog->where('user_id', auth()->user()->id)->where('id', $blog->id)->delete();

        return redirect()->route('blog.index');
    }
}
