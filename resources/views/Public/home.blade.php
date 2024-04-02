@extends('layouts.Public.layout')
@section('content')
<div class="">
    <x-banner />
    <div class="mb-5">
        <x-about-us />
    </div>
    <div class="mb-5">
        <x-articles-section :articles="$articles" />
    </div>
    <div class="mb-5">
        <x-events-section :events="$events" />
    </div>
</div>
@endsection