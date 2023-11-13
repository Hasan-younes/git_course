<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class Postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return view('blog.index')->with('post', Post::get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jped|max:5048'
        ]);
        $slug = Str::slug($request->title, '-');

        $newImageName = uniqid() . "-" . $slug . "." . $request->image->extension();
        $request->image->move(public_path('image'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
            'slug' => $slug
        ]);
        return redirect('/blog');
    }

    /**
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('blog.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jped|max:5048'
        ]);

        $newImageName = uniqid() . "-" . $slug . "." . $request->image->extension();
        $request->image->move(public_path('image'), $newImageName);

        Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
            'slug' => $slug
        ]);
        return redirect('/blog/' . $slug)->with('message', 'Edit on Post');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        Post::where('slug', $slug)->delete();
        return redirect('/blog')->with('message', 'Post Deleted');
    }
}
