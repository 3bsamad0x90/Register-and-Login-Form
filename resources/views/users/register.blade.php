@extends('layouts/app')
@section('title')
    Registration Page
@endsection
@section('content')
<form class="mt-3" method="post" action="{{route('users.store')}}">
    @csrf
    <h3 class="text-center">Registration Page</h3>
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
        @error('username')
            <div class="alert alert-danger mt-1">{{ $errors -> first('username') }}</div>
        @enderror
    </div>
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
        <label>Have an account ?</label>
        <a href="{{route('users.login')}}"> Login </a>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection
