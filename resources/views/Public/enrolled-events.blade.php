@extends('layouts.Public.layout')
@section('content')
<div class="mt-5 mb-5">
    <x-events-section :events="$events" :title="'My Enrolled'" />
</div>
@endsection