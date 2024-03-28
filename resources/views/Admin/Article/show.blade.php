@extends('layouts.Admin.layout')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-3 text-primary fw-bold">Article Details</h1>
        <a href="{{route('articles.index')}}" class="btn btn-primary text-white">
            <i class="bi bi-arrow-left"></i> &nbsp;Articles</a>
    </div>
    <hr>
    <div class="container">
        <x-article-details :article="$article" />
    </div>
</div>
@endsection