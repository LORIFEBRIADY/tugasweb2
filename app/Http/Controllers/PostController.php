<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // tampilkan semua post
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // form create
    public function create()
    {
        return view('posts.create');
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil ditambahkan');
    }

    // tampilkan detail
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // form edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // update data
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil diperbarui');
    }

    // hapus data
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus!');
    }
}