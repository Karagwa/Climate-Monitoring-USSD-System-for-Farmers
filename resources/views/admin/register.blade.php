@extends('layouts.auth')

@section('content')
<div class="card col-lg-4 mx-auto">
    <div class="card-body px-5 py-5">
        <h3 class="card-title text-center mb-3">Create Account</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Name *</label>
                <input type="text" class="form-control p_input @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" class="form-control p_input @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password *</label>
                <input type="password" class="form-control p_input @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Confirm Password *</label>
                <input type="password" class="form-control p_input" 
                       name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
            </div>
            <p class="sign-up text-center">Already have an account?<a href="{{ route('login') }}"> Sign In</a></p>
        </form>
    </div>
</div>
@endsection