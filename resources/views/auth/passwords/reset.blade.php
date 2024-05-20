@extends('auth.layouts.master')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
            <p class="text-center small">Enter new password</p>
        </div>

        <form class="row " method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            {{-- email --}}
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            {{-- password --}}
            <div class="col-12 mb-2">
                <label for="password" class="form-label">Password</label>
                <div class="password-field">
                    <input type="password" name="password" class="form-control">
                    <button type="button" class="btn btn-transparent toggle-password" data-target="password">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            {{-- confirm password --}}
            <div class="col-12 mb-2">
                <label for="password" class="form-label">Enter Confirm Password</label>
                <div class="password-field">
                    <input type="password" name="password_confirmation" class="form-control">
                    <button type="button" class="btn btn-transparent toggle-password" data-target="password_confirmation">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="col-12 mb-2">
                <button class="btn btn-primary w-100" type="submit">Reset Password</button>
            </div>
        </form>

    </div>
@endsection



@section('script')
@endsection
