@props(['event'])
<div class="m-auto mt-5 mb-3" style="max-width: 680px">
    <h1 class="fs-2 fw-bold text-center text-capitalize">{{$event->title}}</h1>
    <div class="text-center mt-5 mb-5">
        <img src="{{asset('/storage/'.$event->image)}}" class="img-fluid m-auto" alt="event image">
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <p class="text-black-50 me-md-5"><i class="bi bi-alarm"></i> Time :
            {{\Carbon\Carbon::parse($event->time)->format('h:i
            A')}}</p>
        <p class="text-black-50 me-md-5"><i class="bi bi-calendar-event"></i> Date :
            {{\Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</p>
        <p class="text-black-50"><i class="bi bi-geo-alt"></i> Location :
            {{$event->location}}</p>
    </div>
    <div class="mb-3">
        <p class="" style="text-align: justify;">
            &emsp; {{$event->description}}
        </p>
    </div>
    <div class=" d-flex justify-content-between align-items-center">
        <p class="mb-0 text-black-50">Total {{$event->enrollments->count()}} <i class="bi bi-person"></i> enrolled this
            event.</p>
        @if (!auth()->user()->is_admin)
        <button class="btn btn-primary text-white">Enroll Event Now</button>
        @endif
    </div>
</div>