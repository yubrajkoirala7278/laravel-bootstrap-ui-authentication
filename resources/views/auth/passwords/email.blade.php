@extends('auth.layouts.master')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
            <p class="text-center small">Enter your email</p>
        </div>

        <form class="row"  method="POST" action="{{ route('password.email') }}">
            @csrf
            {{-- email --}}
            <div class="col-12 mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Send Password Reset Link</button>
            </div>
        </form>

    </div>
@endsection



@section('script')
@endsection
