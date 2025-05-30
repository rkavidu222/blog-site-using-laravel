@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Trashed Posts') }}</div>

        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Restore</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="50" height="50">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td><em>Trashed</em></td>
                                <td>
                                    <a href="{{ route('posts.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-success">Restore</a>
                                </td>
                                <td>
                                    <a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No trashed posts</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
