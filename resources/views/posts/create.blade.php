@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $community->name }}: Add Post
        </div>
        
        <div class="card-body">
            
            <form method="POST"
                  enctype="multipart/form-data"
                  action="{{ route('communities.posts.store', $community) }}">
                @csrf
                <div class="row mb-3">
                    <label for="title"
                           class="col-md-4 col-form-label text-md-end">
                        {{ __('Title') }}*
                    </label>
                    
                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control
                                @error('title') is-invalid @enderror" name="title"
                               value="{{ old('title') }}"
                               autofocus>
                        
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="post_text" class="col-md-4 col-form-label text-md-end">
                        {{ __('Post Text') }}
                    </label>
                    
                    <div class="col-md-6">
                                    <textarea rows="10" class="form-control @error('post_text')
                                    is-invalid
                                     @enderror" name="post_text">{{ old('post_text') }}</textarea>
                        @error('post_text')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="post_url"
                           class="col-md-4 col-form-label text-md-end">
                        {{ __('URL Link') }}
                    </label>
                    
                    <div class="col-md-6">
                        <input id="post_url" type="text" class="form-control
                                @error('post_url') is-invalid @enderror" name="post_url"
                               value="{{ old('post_url') }}"
                               autofocus>
                        
                        @error('post_url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="post_image"
                           class="col-md-4 col-form-label text-md-end">
                        {{ __('Image') }}
                    </label>
                    
                    <div class="col-md-6">
                        <input type="file" name="post_image" class="form-control
                                @error('post_image') is-invalid @enderror">
                        
                        @error('post_image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                
                
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create Post') }}
                        </button>
                    </div>
                </div>
            </form>
        
        </div>
    </div>
@endsection
