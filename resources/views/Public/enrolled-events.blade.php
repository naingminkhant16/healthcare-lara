@extends('layouts.Public.layout')
@section('content')
@if ($events->count())
<div class="mt-5 mb-5">
    <x-events-section :events="$events" :title="'My Enrolled'" />
</div>
@else
<div class="mb-5 mt-5 d-flex justify-content-center align-items-center" style="height: 350px">
    <p class="text-center text-black-50">No Enrolled Events</p>
</div>
@endif
@endsection