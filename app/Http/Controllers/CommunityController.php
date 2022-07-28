<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Str;

class CommunityController extends Controller {

    public function index()
    {
        $communities = Community::where('user_id', auth()->id())->get();

        return view('communities.index', [
            'communities' => $communities,
        ]);
    }


    public function create()
    {
        $topics = Topic::all();

        return view('communities.create', [
            'topics' => $topics,
        ]);
    }

    public function store(StoreCommunityRequest $request)
    {
        $community = Community::create($request->validated() + [
                'user_id' => auth()->id(),
            ]);
        $community->topics()->attach($request->topics);

        return redirect()->route('communities.show', $community);
    }

    public function show(Community $community)
    {
        $query = $community->posts();

        if (request('sort', '') === 'popular') {
            $query->orderBy('votes', 'desc');
        } else {
            $query->latest('id');
        }

        $posts = $query->paginate(5);

        return view('communities.show', [
            'community' => $community,
            'posts'     => $posts,
        ]);
    }


    public function edit(Community $community)
    {

        if ( $community->user_id !== auth()->id() ) {
            abort(403);
        }

        $community->load('topics');

        return view('communities.edit', [
            'community' => $community,
            'topics'    => Topic::all(),
        ]);
    }


    public function update(UpdateCommunityRequest $request, Community $community)
    {
        if ( $community->user_id !== auth()->id() ) {
            abort(403);
        }

        $community->update($request->validated());
        $community->topics()->sync($request->topics);

        return redirect()->route('communities.index')->with('message', 'Community updated successfully.');
    }

    public function destroy(Community $community)
    {
        if ( $community->user_id !== auth()->id() ) {
            abort(403);
        }

        $community->delete();

        return redirect()->route('communities.index')->with('message', 'Community deleted');
    }

}
