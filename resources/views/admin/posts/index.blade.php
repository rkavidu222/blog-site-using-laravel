@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Posts') }}</div>

        <div class="card-body">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Trash</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="50px" height="50px"></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">Trash</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No published posts</th>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection
