@props(['article'])
<div class="">
    <div class="card">
        <img src="{{asset('storage/'.$article->image)}}" class="card-img-top img-fluid" alt="article image">
        <div class="card-body">
            <h5 class="card-title fw-bold">{{$article->title}}</h5>
            <p class="card-text text-secondary">{{Str::words($article->content,20,'...')}}</p>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('public.articles.show',$article->id)}}" class="text-decoration-none text-primary">Read
                    More <i class="bi bi-arrow-right"></i></a>
                <p class="mb-0 text-primary">{{\Carbon\Carbon::parse($article->date)->toFormattedDateString()}}</p>
            </div>
        </div>
    </div>
</div>