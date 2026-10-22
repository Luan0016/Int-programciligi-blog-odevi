<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }

    public function create()
    {
        if (!session('is_admin')) {
            return redirect()->route('login');
        }
        return view('admin');
    }

    public function store(Request $request)
    {
        if (!session('is_admin')) {
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
        ]);

        return redirect()->route('home')->with('success', 'Blog yazısı başarıyla eklendi.');
    }

    public function destroy($id)
    {
        if (!session('is_admin')) {
            return redirect()->route('login');
        }

        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Blog yazısı başarıyla silindi.');
    }
}
