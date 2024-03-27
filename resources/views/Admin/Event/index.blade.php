@extends('layouts.Admin.layout')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-3 text-primary fw-bold">Events Management</h1>
        <a href="{{route('events.create')}}" class="btn btn-primary text-white">
            <i class="bi bi-plus-circle"></i> &nbsp;Create Event</a>
    </div>
    <hr>
    @if (Session::has('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
    @endif
    <div class="overflow-auto">
        <table class="table  table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Location</th>
                    <th scope="col">Time</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Enrolled Users</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{Str::words($event->title, 5, '...')}}</td>
                    <td>{{Str::words($event->description, 5, '...')}}</td>
                    <td>{{\Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</td>
                    <td>{{$event->location}}</td>
                    <td>{{\Carbon\Carbon::parse($event->time)->format('h:i A')}}</td>
                    <td><img src="{{asset('storage/'.$event->image)}}" alt="Event Image" width="100px"></td>
                    <td>
                        Total - {{$event->enrollments->count()}}
                    </td>
                    <td>
                        <a href="{{route('events.show',$event->id)}}"
                            class="mb-1 mb-md-0 btn btn-primary btn-sm text-white">Details</a>
                        <a href="{{route('events.edit',$event->id)}}"
                            class="mb-1 mb-md-0 btn btn-secondary btn-sm text-white">Edit</a>
                        <a class="mb-1 mb-md-0 btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        {{$events->links()}}
    </div>
</div>
@endsection