@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Categories') }}</div>

        <div class="card-body">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No categories yet</th>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection
