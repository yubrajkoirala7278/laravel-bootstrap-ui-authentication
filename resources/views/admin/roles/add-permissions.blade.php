@extends('admin.layouts.master')
@section('content')
<div class="bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-0  ">
        <h2 class="fw-semibold fs-5 text-success">Role: {{$role->name}}</h2>
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
    </div>
    <hr>
    <div>
        <p class="mb-0">Permissions</p>
        
        <form action="{{route('give.permissions.to.role',$role->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center" style="flex-wrap: wrap;gap:30px">
                @foreach ($permissions as $permission)
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="{{ $permission->name }}" name="permission[]"
                        value="{{ $permission->name }}" @checked(in_array($permission->id, $rolePermissions))
                    >
                    <label class="form-check-label" for="{{$permission->name}}">{{ $permission->name }}</label>
                </div>
                @endforeach

            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>

    </div>
</div>
@endsection

@section('script')
@endsection