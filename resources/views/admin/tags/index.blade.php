@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Tags') }}</div>

        <div class="card-body">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Tag name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($tags->count() > 0)
                        @foreach ($tags as $tag)
                            <tr>
                                <td>
                                    {{ $tag->tag }}
                                </td>

                                <td>
                                    <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No tags yet</th>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection
