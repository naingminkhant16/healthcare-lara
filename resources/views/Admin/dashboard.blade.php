@extends('layouts.Admin.layout')
@section('content')

<div>
    <div class="row g-3">
        <div class="col-12 col-md-4">
            <div class="p-4 rounded-3 shadow border">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h3 class="text-black-50">{{$total_users}}</h3>
                        <span class="text-black-50">Total Users</span>
                    </div>
                    <div class="">
                        <i class="bi bi-person-fill fs-1 text-black-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="p-4 rounded-3 shadow border">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h3 class="text-black-50">{{$total_events}}</h3>
                        <span class="text-black-50">Total Events</span>
                    </div>
                    <div class="">
                        <i class="bi bi-calendar2-event-fill text-black-50 fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="border p-4 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h3 class="text-black-50">{{$total_articles}}</h3>
                        <span class="text-black-50">Total Articles</span>
                    </div>
                    <div class="">
                        <i class="bi bi-book-half fs-1 text-black-50"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-5 m-auto" style="max-width: 600px">
        <canvas id="myChart"></canvas>
    </div>

    <script type="module">
        window.showChart({{$total_users}},{{$total_events}},{{$total_articles}})
    </script>

</div>
@endsection