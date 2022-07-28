@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Most Poluplar') }}</div>
        
        <div class="card-body">
    
    
            @foreach($posts as $post)
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
                                @livewire('post-votes', ['post' => $post])
                            </div>
                            <div class="col-11">
                                <p>{!! Str::words($post->post_text, 40) !!}</p>
                            </div>
                        </div>
            
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('communities.posts.show', [$post->community,
                                $post])
                                 }}"
                                   class="btn btn-sm btn-secondary">
                                    {{ __('View Post') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>
    </div>
@endsection
