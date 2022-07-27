@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">{{ __('My Community') }}</div>
            
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <a href="{{ route('communities.create') }}" class="btn btn-primary">Create
                    Community</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($communities as $community)
                        <tr>
                            <td>
                                <a href="{{ route('communities.show', $community) }}">
                                    {{ $community->name }}
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm
                                            btn-primary" href="{{ route('communities.edit', $community)
                                             }}"
                                >Edit</a>
                                <form action="{{ route('communities.destroy', $community) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm
                                            btn-danger">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                No communities yet.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection
