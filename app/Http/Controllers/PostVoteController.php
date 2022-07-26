<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostVote;
use App\Http\Requests\StorePostVoteRequest;
use App\Http\Requests\UpdatePostVoteRequest;

class PostVoteController extends Controller {

    public function store($post_id, $vote)
    {
        $post = Post::with('community')->findOrFail($post_id);

        if ( !PostVote::where('post_id', $post_id)->where('user_id', auth()->id())->count()
        && in_array($vote, [-1, 1]) && $post->user_id !== auth()->id()) {
            PostVote::create([
                'post_id' => $post_id,
                'user_id' => auth()->id(),
                'vote'    => $vote,
            ]);

            $post->increment('votes', $vote);
        }


        return redirect()->route('communities.show', $post->community);
    }

}
