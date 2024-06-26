@extends('layouts.Public.layout')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-md-6 d-flex justify-content-center align-items-center mb-5">
        <img src="{{asset('contactus.png')}}" alt="Banner Gif" class="img-fluid">
    </div>
    <div class="col-md-6 d-flex justify-content-start align-items-center">
        <div class="w-100">
            <h1 class="fs-1 fw-bold mb-3">Contact Us</h1>
            <hr>
            <p class="text-black-50">You can reach us via the informaiton below. </p>
            <div class="mt-5">
                <a href="tel:+959952128" class="text-decoration-none text-dark fs-5  mb-3 d-block">
                    <i class="bi bi-telephone-fill me-3 text-primary"></i> Call: +959 952 128 314</a>

                <a href="mailto:tharkhant777@gmail.com" class="text-decoration-none fs-5 text-dark mb-3 d-block">
                    <i class="bi bi-envelope-fill me-3 text-primary"></i> tharkhant777@gmail.com</a>

                <span class="d-block fs-5">
                    <i class="bi bi-geo-alt-fill me-3 text-primary"></i> Yangon, Myanmar</span>
            </div>
        </div>
    </div>
</div>


@endsection