@extends('layouts.Public.layout')
@section('content')

@if ($articles->count())
<div class="mt-5 mb-5">
    <x-articles-section :articles="$articles" :title="'\''.request('search').'\''.' related '" />
</div>
@else
<div class="d-flex align-items-center justify-content-center" style="height: 250px">
    <p class="text-black-50 text-center text-capitalize">No articles related to '{{request('search')}}'</p>
</div>
<hr>
@endif

@if ($events->count())
<div class="mt-5 mb-5">
    <x-events-section :events="$events" :title="'\''.request('search').'\''.' related '" />
</div>
@else
<div class="d-flex align-items-center justify-content-center" style="height: 250px">
    <p class="text-black-50 text-center text-capitalize">No events related to '{{request('search')}}'</p>
</div>
@endif

@endsection