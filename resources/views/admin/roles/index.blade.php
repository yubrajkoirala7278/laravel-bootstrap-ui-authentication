@extends('admin.layouts.master')
@section('content')
    <div class="bg-white p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-5">Roles</h2>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Roles</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($roles) > 0)
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm d-inline">Edit</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                 <tr class="text-center">
                    <td colspan="13">No Roles to display</td>
                 </tr>
                @endif


            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
