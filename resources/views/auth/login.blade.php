@extends('auth.layouts.master')

@section('title')
Login
@endsection

@section('content')
<div class="card-body">
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
        <p class="text-center small">Enter your name & password to login</p>
    </div>

    <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('login')}}">
        @csrf
        {{-- email --}}
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{old('email')}}" autocomplete="off">
            @if ($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>

        {{-- password --}}
        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <div class="password-field">
                <input type="password" name="password" class="form-control" autocomplete="off">
                <button type="button" class="btn btn-transparent toggle-password" data-target="password">
                    <i class="far fa-eye"></i>
                </button>
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        {{-- remember --}}
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            @if ($errors->has('remember'))
            <span class="text-danger">{{ $errors->first('remember') }}</span>
            @endif
        </div>

        {{-- reset forget password --}}
        <div class="col-12">
            <p class="small mb-0"><a href="{{ route('password.request') }}">Forget Password?</a></p>
        </div>

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Login</button>
        </div>
    </form>

</div>
@endsection



@section('script')
@endsection