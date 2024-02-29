<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excert' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect('/admin/posts')->with('success', 'Your post has been updated!');
    }

    public function store()
    {
        $attributes = array_merge(
            request()->validate([
                'title' => 'required',
                'thumbnail' => 'required|image',
                'slug' => ['required', 'unique:posts'],
                'excert' => 'required',
                'body' => 'required',
                'category_id' => ['required', 'exists:categories,id'],
            ]),
            ['user_id' => auth()->id()],
            ['thumbnail' => request()->file('thumbnail')->store('thumbnails')]
        );

        Post::create($attributes);

        return redirect('/')->with('success', 'Your post has been created!');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts')->with('success', 'Your post has been deleted!');
    }
}
