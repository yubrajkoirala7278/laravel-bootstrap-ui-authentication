@extends('admin.layouts.master')
@section('content')
    <div class="p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-5">Users</h2>
            <a href="{{route('users.create')}}" class="btn btn-primary">Add User</a>
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
                <tr>
                    <td>1</td>
                    <td>Yubraj Koirala</td>
                    <td>yubrajkoirala@gmail.com</td>
                    <td>
                        <div class="d-flex align-items-center" style="gap: 10px;flex-wrap:wrap">
                            <span class="badge rounded-pill text-bg-success">Success</span>
                            <span class="badge rounded-pill text-bg-success">Success</span>
                            <span class="badge rounded-pill text-bg-success">Success</span>
                        </div>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <form action="" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
