<div>
    @if($post->user_id != auth()->id())
        <div>
            <a wire:click.prevent="vote(1)" href="#">
                <i class="fa fa-2x fa-sort-asc"
                   aria-hidden="true"></i>
            </a>
        </div>
    @endif
    <b>{{ $sumVotes }}</b>
    @if($post->user_id != auth()->id())
        <div>
            <a wire:click.prevent="vote(-1)" href="#">
                <i class="fa fa-2x fa-sort-desc"
                   aria-hidden="true"></i>
            </a>
        </div>
    @endif
</div>
