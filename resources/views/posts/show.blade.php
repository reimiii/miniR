@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            {{ $post->title }}
            <div class="float-sm-end">
                <p class="" style="display: inline;">
                    Vote : {{ $post->votes }}
                </p>
                |
                <form method="POST"
                      onclick="return confirm('Are you sure you want to report this post?')"
                      style="display: inline-block"
                      action="{{ route('posts.report', $post->id) }}">
                    @csrf
                    <button
                            type="submit"
                            class="btn btn-sm btn-link">Report this post
                    </button>
                </form>
            </div>
        </div>
        
        <div class="card-body">
            
            @if($post->post_url)
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ $post->post_url }}"
                           target="_blank">{{ $post->post_url }}</a>
                    </div>
                </div>
            @endif
            @if($post->post_image)
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('storage/posts/' . $post->id . '/' . $post->post_image ) }}"
                             class="img-fluid"
                             alt="{{ $post->title }}">
                    </div>
                </div>
            @endif
            <div class="row mt-1">
                <div class="col-md-12">
                    <p>{{ $post->post_text }}</p>
                </div>
            </div>
        
        
        </div>
        
        <div class="card-footer">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('communities.show', [$community]) }}"
                       class="btn btn-sm btn-secondary">
                        {{ __('Back to Community') }}
                    </a>
                    @auth
                        @if($post->user_id === auth()->id())
                            <a href="{{ route('communities.posts.edit', [$community, $post]) }}"
                               class="btn btn-sm
                                btn-primary">Edit</a>
                        @endif
                        @if(in_array(auth()->id(), [$post->user_id, $post->community->user_id]))
                            <form method="POST"
                                  style="display: inline-block"
                                  action="{{ route('communities.posts.destroy', [$community, $post]) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                        type="submit"
                                        class="btn btn-sm btn-danger">Delete
                                </button>
                            </form>
                        @else
                        @endif
                    @endauth
                </div>
            </div>
        
        
        </div>
    </div>

@endsection

@section('some-content')
    
    @include('comments.index', ['post' => $post])
@endsection
