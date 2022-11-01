@extends('layouts/app')
@section('title')
    Login Page
@endsection
@section('content')
@if(isset($invalid))
@foreach($invalid as $error)
<div class="alert alert-danger mt-3">
    {{$error}}
</div>
@endforeach
@endif
<form class="m-4" method="post" action="{{route('users.loginHandle')}}">
    @csrf
    <h3 class="text-center">Login Page</h3>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('email')
            <div class="alert alert-danger mt-1">{{ $errors -> first('email') }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"" id="password" name="password">
        @error('password')
            <div class="alert alert-danger mt-1">{{ $errors -> first('password') }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Not Have an account?</label>
        <a href="{{route('users.register')}}"> Create Account</a>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection
