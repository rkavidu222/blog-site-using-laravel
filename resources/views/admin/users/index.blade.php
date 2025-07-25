@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Users') }}</div>

        <div class="card-body">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>

                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius:50%">
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    @if ($user->admin)

                                        <a href="{{ route('user.not_admin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove permissions</a>


                                    @else

                                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make as admin</a>


                                    @endif
                                </td>

                                <td>
                                      @if (Auth::id() !== $user->id)

                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete Account</a>



                                      @endif

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No users</th>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection
