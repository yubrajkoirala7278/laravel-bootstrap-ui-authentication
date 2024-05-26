@extends('admin.layouts.master')
@section('content')
    <div class="p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-5">Users</h2>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        </div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{-- get specific user roles --}}
                                <div class="d-flex align-items-center" style="gap: 10px;flex-wrap:wrap">
                                    @if (count($user->getRoleNames())> 0)
                                        @foreach ($user->getRoleNames() as $role)
                                            <span class="badge rounded-pill text-bg-success">{{ $role }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{route('users.edit',$user)}}" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{route('users.destroy',$user)}}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td class="text-center">
                        <tr>No user to display</tr>
                    </td>
                @endif

            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
