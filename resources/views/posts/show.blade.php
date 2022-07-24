@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>
                    
                    <div class="card-body">
                        
                        @if($post->post_url)
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ $post->post_url }}"
                                       target="_blank">{{ $post->post_url }}</a>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $post->post_text }}</p>
                            </div>
                        </div>
                    
                    
                    </div>
                    <div class="card-footer">
                        
                        
                        @auth
                            <div class="row">
                                @if($post->user_id === auth()->id())
                                    <div class="col-md-6">
                                        <a href="{{ route('communities.posts.edit', [$community, $post]) }}"
                                           class="btn btn-sm
                                btn-primary">Edit</a>
                                        <form method="POST"
                                              style="display: inline-block"
                                              action="{{ route('communities.posts.destroy', [$community, $post]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')"
                                                    type="submit"
                                                    class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        
                        @endauth
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection