@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-sm-start">
                {{ $community->name }}
            </div>
            <div class="float-sm-end">
                <a href="{{ route('communities.show', $community) }}"
                
                   @if(request('sort', '') == '')
                       class="btn btn-sm btn-primary mx-1"
                   @else
                       class="btn btn-sm btn-secondary mx-1"
                        @endif>
                    Newest Post
                </a>
                <a href="{{ route('communities.show', $community) }}?sort=popular"
                   style="display: inline;"
                
                   @if(request('sort', '') == 'popular')
                       class="btn btn-sm btn-primary mx-1"
                   @else
                       class="btn btn-sm btn-secondary mx-1"
                        @endif>
                    Popular
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <a href="{{ route('communities.posts.create', $community) }}"
               class="btn btn-sm btn-secondary">
                {{ __('Add Post') }}t</a>
            <hr>
            @forelse($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $post->title }}
                        <div class="float-sm-end">
                            <p class="" style="display: inline;">
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1 text-center">
                                <div>
                                    <a href="{{ route('posts.vote', [$post->id, 1]) }}">
                                        <i class="fa fa-2x fa-sort-asc"
                                           aria-hidden="true"></i>
                                    </a>
                                </div>
                                <b>{{ $post->votes }}</b>
                                <div>
                                    <a href="{{ route('posts.vote', [$post->id, -1]) }}">
                                        <i class="fa fa-2x fa-sort-desc"
                                           aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-11">
                                <p>{!! Str::words($post->post_text, 40) !!}</p>
                            </div>
                        </div>
                    
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('communities.posts.show', [$community, $post]) }}"
                                   class="btn btn-sm btn-secondary">
                                    {{ __('View Post') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posts yet.</p>
            @endforelse
        </div>
        <div class="card-footer">
            
            <div class="row justify-content-center">
                
                
                <div class="col-md-6">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            {{ $posts->links() }}
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection
