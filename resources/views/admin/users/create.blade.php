@extends('admin.layouts.master')
@section('content')
    <div class="p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-5">Users</h2>
            <a href="" class="btn btn-primary">Back</a>
        </div>
        <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    autocomplete="off">
                @if ($errors->has('name'))
                    <span class="fs-6 text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    autocomplete="off">
                @if ($errors->has('email'))
                    <span class="fs-6 text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                @if ($errors->has('password'))
                    <span class="fs-6 text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="roles" class="form-label">Roles</label>
                <select class="form-select" id="select-roles" data-placeholder="Choose Roles" multiple name="roles[]">
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ in_array($role, old('roles', [])) ? 'selected' : '' }}>
                                {{ $role }}</option>
                        @endforeach
                    @endif
                </select>


                @if ($errors->has('roles'))
                    <span class="text-danger text-sm">{{ $errors->first('roles') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('script')
    {{-- multiple select fields --}}
    <script>
        $(document).ready(function() {
            $('#select-roles').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
                tags: true
            });
        });
    </script>
@endsection
