<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostVote;
use App\Notifications\PostReportNotification;

class PostVoteController extends Controller {

    public function store($post_id, $vote)
    {
        $post = Post::with('community')->findOrFail($post_id);

        if ( !PostVote::where('post_id', $post_id)->where('user_id', auth()->id())->count()
            && in_array($vote, [
                -1,
                1
            ]) && $post->user_id !== auth()->id() ) {
            PostVote::create([
                'post_id' => $post_id,
                'user_id' => auth()->id(),
                'vote'    => $vote,
            ]);
        }


        return redirect()->route('communities.show', $post->community);
    }

    public function report($post_id)
    {
        $post = Post::with('community.user')->findOrFail($post_id);

        $post->community->user->notify(new PostReportNotification($post));

        return redirect()->route('communities.posts.show', [$post->community, $post])
            ->with('success', 'Your report has been sent to the community owner.');


    }

}
