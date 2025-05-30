@extends('layouts.app')

@section('content')

@include('admin.includes.errors')


    <div class="card">
        <div class="card-header">
            Edit category {{ $category->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div><br>

                <div class="text-center">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                                Update category
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>



@stop


