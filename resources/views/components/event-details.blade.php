@props(['event'])

<div class="m-auto mt-5 mb-5" style="max-width: 680px">
    @if (Session::has('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
    @endif
    <h1 class="fs-2 fw-bold text-capitalize">{{$event->title}}</h1>
    <div class="text-center mt-5 mb-5">
        <img src="{{asset('/storage/'.$event->image)}}" class="img-fluid m-auto" alt="event image">
    </div>
    <div class="row g-0 mb-3">
        <p class="col-md-4 text-black-50 text-center"><i class="bi bi-alarm"></i> Time :
            {{\Carbon\Carbon::parse($event->time)->format('h:i
            A')}}</p>
        <p class="col-md-4 text-black-50 text-center "><i class="bi bi-calendar-event"></i> Date :
            {{\Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</p>
        <p class="col-md-4 text-black-50 text-center"><i class="bi bi-geo-alt"></i> Location :
            {{$event->location}}</p>
    </div>
    <div class="mb-5">
        <p class="" style="text-align: justify;">
            &emsp; {{$event->description}}
        </p>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <p class="mb-0 text-black-50">Total {{$event->enrollments->count()}} <i class="bi bi-person"></i> enrolled this
            event.</p>
        @if (! App\Models\Enrollment::where('user_id', '=', auth()->id())
        ->where('event_id', '=', $event->id)->count())
        <button type="submit" class="btn btn-primary text-white" form="enrollForm{{$event->id}}">
            Enroll Event Now</button>
        <form action="{{route('events.enroll',$event->id)}}" id="enrollForm{{$event->id}}" method="POST" class="d-none">
            @csrf
        </form>
        @else
        <p class="mb-0 text-black-50">You have enrolled in this event.</p>
        <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#model" type="button">
            Cancel Enrollment</button>
        <!-- Modal -->
        <div class="modal fade" id="model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        Are you sure you want to cancel event?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger text-white" form="cancelEvent">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('events.cancel',$event->id)}}" class="d-none" method="POST" id="cancelEvent">
            @csrf
            @method('delete')
        </form>
        @endif
    </div>
</div>