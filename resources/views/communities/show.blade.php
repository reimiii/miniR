@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $community->name }}</div>
                    
                    <div class="card-body">
                        <a href="{{ route('communities.posts.create', $community) }}"
                           class="btn btn-primary">
                            {{ __('Add Post') }}t</a>
                        <hr>
                        @forelse($posts as $post)
                            <div class="card">
                                <div class="card-header">
                                    {{ $post->title }}
                                </div>
                                
                                <div class="card-body">
                                    
                                    <p>{!! Str::words($post->post_text, 40) !!}</p>
                                    <p>
                                        <a href="{{ route('communities.posts.show', [$community, $post]) }}"
                                           class="btn btn-primary">
                                            {{ __('View Post') }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <hr>
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
            </div>
        </div>
    </div>
@endsection
