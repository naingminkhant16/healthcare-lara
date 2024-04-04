@extends('layouts.Admin.layout')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-3 text-primary fw-bold">Event Details</h1>
        <a href="{{route('events.index')}}" class="btn btn-primary text-white">
            <i class="bi bi-arrow-left"></i> &nbsp;Events</a>
    </div>
    <hr>
    <div class="container">
        <x-event-details :event="$event" />

        @if ($enrolledUsers->count())
        <div class="overflow-auto m-auto" style="max-width: 680px">
            <h4 class="fw-bold">Enrolled Users In This Event</h4>
            <hr>
            <table class="table  table-hover ">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrolledUsers as $user)
                    <tr>
                        <td>#{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

@endsection