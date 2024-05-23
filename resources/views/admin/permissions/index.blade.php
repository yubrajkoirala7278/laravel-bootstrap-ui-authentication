@extends('admin.layouts.master')
@section('content')
    <div class="bg-white p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-5">Permissions</h2>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add Permissions</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $key => $permission)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission) }}"
                                class="btn btn-warning btn-sm d-inline">Edit</a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
