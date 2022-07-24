<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller {

    public function index(Community $community)
    {
        $posts = $community->posts()->latest('id')->paginate(10);
    }


    public function create(Community $community)
    {
        return view('posts.create', [
            'community' => $community,
        ]);
    }

    public function store(StorePostRequest $request, Community $community)
    {
        $image = '';

        if ( $request->hasFile('post_image') ) {
            $image = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')
                ->storeAs('posts', $image);
        }

        $community->posts()->create([
            'user_id'    => auth()->id(),
            'post_image' => $image,
            'title'      => $request->title,
            'post_url'   => $request->post_url ?? '',
            'post_text'  => $request->post_text ?? '',
        ]);

        return redirect()->route('communities.show', $community);
    }

    public function show(Community $community, Post $post)
    {
        return view('posts.show', [
            'community' => $community,
            'post'      => $post,
        ]);
    }

    public function edit(Community $community, Post $post)
    {
        if ( $post->user_id !== auth()->id() ) {
            abort(403);
        }

        return view('posts.edit', [
            'community' => $community,
            'post'      => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, Community $community, Post $post)
    {
        if ( $post->user_id !== auth()->id() ) {
            abort(403);
        }

        $post->update($request->validated());

        return redirect()->route('communities.posts.show', [
            $community,
            $post
        ]);
    }

    public function destroy(Community $community, Post $post)
    {
        if ( $post->user_id !== auth()->id() ) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('communities.show', $community);
    }

}