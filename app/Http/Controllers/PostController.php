<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('posts.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $post->save();

        return redirect()->route('posts.create')
            ->with('success', 'the title: ' . $post->title .
                ', desc: ' . $post->description);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show',['post'=>Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit',['post'=>Post::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $post->save();

        return redirect()->route('home')
            ->with('success', 'the post updated. ') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
