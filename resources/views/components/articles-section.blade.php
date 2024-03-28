@props(['articles'])
<div class="">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fs-1 fw-bold">
            Our Latest <span class="text-primary">Articles</span>
        </h1>
        @if(!request()->routeIs('public.articles'))
        <a href="{{route('public.articles')}}" class="text-decoration-none text-primary">View All <i
                class="bi bi-arrow-right"></i></a>
        @endif
    </div>
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-md-4">
            <x-article :article="$article" />
        </div>
        @endforeach
    </div>
    @if(request()->routeIs('public.articles'))
    <div class="mb-3">
        {{$articles->links()}}
    </div>
    @endif
</div>