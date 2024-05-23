@extends('admin.layouts.master')
@section('content')
    <div class="p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-5">Add Roles</h2>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
        </div>
        <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="fs-6 text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('script')
@endsection
