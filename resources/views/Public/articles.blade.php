@extends('layouts.Public.layout')
@section('content')
<div class="mt-5 mb-5">
    <x-articles-section :articles="$articles" />
</div>
@endsection