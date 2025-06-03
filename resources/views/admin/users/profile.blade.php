@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
    <div class="card-header">
        Edit your profile
    </div>
    <div class="card-body">
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">User name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div><br>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">New password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="avatar">Upload new avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" value="{{ optional($user->profile)->facebook ?? '' }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" value="{{ optional($user->profile)->youtube ?? '' }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ optional($user->profile)->about ?? '' }}</textarea>
            </div><br>

            <div class="text-center">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
