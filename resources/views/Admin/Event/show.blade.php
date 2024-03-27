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
    </div>
</div>
@endsection