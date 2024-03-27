@props(['event'])
<div class="card mb-3 shadow">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="">
                <img src="{{asset('storage/'.$event->image)}}" class="img-fluid rounded" alt="Event Image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title text-capitalize fw-bold">{{Str::limit($event->title,25)}}</h5>
                <p class="card-text text-secondary">{{Str::words($event->description,15,'...')}}</p>
                <p class="card-text">
                    <small class="text-body-secondary">Event Date -
                        {{\Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</small>
                </p>
                <div class="text-end">
                    <a href="{{route('public.events.show',$event->id)}}" class="btn btn-outline-primary ">See
                        Details</a>
                </div>
            </div>
        </div>
    </div>
</div>