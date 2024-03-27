@props(['events'])
<div class="">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fs-1 fw-bold">
            Our Latest <span class="text-primary">Events</span>
        </h1>
        @if(!request()->routeIs('public.events'))
        <a href="{{route('public.events')}}" class="text-decoration-none text-primary">View All <i
                class="bi bi-arrow-right"></i></a>
        @endif
    </div>
    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-6">
            <x-event :event="$event" />
        </div>
        @endforeach
    </div>
    @if (request()->routeIs('public.events'))
    <div>
        {{$events->links()}}
    </div>
    @endif
</div>