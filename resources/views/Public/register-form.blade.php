@extends('layouts.Public.layout')
@section('content')
<div class="mt-5 mb-5">
    <div class="m-auto border shadow p-5 rounded" style="max-width: 480px">
        <h1 class="fs-1 fw-bold text-center mb-3"><span class="text-primary">Register</span> Form</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('message'))
        <div class="alert alert-info">
            {{session('message')}}
        </div>
        @endif
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password_confirmation" class="form-control" name="password_confirmation">
            </div>
            <div>
                <button type="submit" class="btn btn-primary text-white w-100">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection