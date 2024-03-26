@extends('layouts.Admin.layout')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-3 text-primary fw-bold">Create New Event</h1>
        <a href="{{route('events.index')}}" class="btn btn-primary text-white">
            <i class="bi bi-arrow-left"></i> &nbsp;Events</a>
    </div>
    <hr>
    <div class="m-auto p-3 rounded border" style="max-width: 600px">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5 ">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" value="{{old('date')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" value="{{old('location')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" name="time" value="{{old('time')}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Poster</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="text-end">
                <button class="btn btn-primary text-white" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection