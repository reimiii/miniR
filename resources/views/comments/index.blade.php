<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Comments for {{ $post->title }}
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-12">
    
                            <form method="POST" action="{{ route('posts.comments.store', $post) }}">
        
                                @csrf
                                <div class="form-group">
                                    <label for="comment_text">Comment</label>
                                    <textarea
                                            class="form-control @error('comment_text') is-invalid @enderror"
                                            id="comment_text" name="comment_text"
                                            rows="3"></textarea>
                                </div>
        
                                <div class="form-group">
                                    <button type="submit"
                                            class="mt-3 mb-2 btn btn-sm btn-secondary float-sm-end">
                                        {{ __('Add Comment') }}
                                    </button>
                                </div>
    
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        @forelse($post->comments as $comment)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <p>{{ $comment->comment_text }}</p>
                                    <div class="row">
                                        <div class="col-md-12 text-muted">
                                            <small>
                                                {{ $comment->user->name }}
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No comments yet.</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    Something here
                </div>
            </div>
        </div>
    </div>
</div>