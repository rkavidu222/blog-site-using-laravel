@extends('layouts.app')

@section('content')


@include('admin.includes.errors')


    <div class="card">
        <div class="card-header">
            Create a new tag
        </div>
        <div class="card-body">
            <form action="{{route('tag.store')}}" method="POST" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="text" name="tag" class="form-control">
                </div><br>

                <div class="text-center">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                                Store tag
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>



@stop


