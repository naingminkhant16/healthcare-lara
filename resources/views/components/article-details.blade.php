@props(['article'])

<div class="m-auto mt-5 mb-5" style="max-width: 680px">
    <h1 class="fs-2 fw-bold text-capitalize">{{$article->title}}</h1>
    <div class="text-center mt-5 mb-5">
        <img src="{{asset('/storage/'.$article->image)}}" class="img-fluid m-auto" alt="article image">
    </div>
    <div class="row g-0 mb-3">
        <p class="col-md-6 text-black-50 text-center"><i class="bi bi-pencil"></i> Publisher :
            <span class="text-primary">{{$article->user->name}}</span>
        </p>
        <p class="col-md-6 text-black-50 text-center "><i class="bi bi-calendar-check"></i> Published Date :
            {{\Carbon\Carbon::parse($article->date)->toFormattedDateString()}}</p>

    </div>
    <div class="mb-5">
        <p class="" style="text-align: justify;">
            &emsp; {{$article->content}}
        </p>
        <p class="text-black-50 text-end"><i class="bi bi-calendar-check"></i> Latest Edit :
            {{\Carbon\Carbon::parse($article->updated_at)->toFormattedDateString()}}</p>
    </div>
</div>