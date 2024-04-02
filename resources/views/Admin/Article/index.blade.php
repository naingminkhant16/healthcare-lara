@extends('layouts.Admin.layout')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-3 text-primary fw-bold">Articles Management</h1>
        <a href="{{route('articles.create')}}" class="btn btn-primary text-white">
            <i class="bi bi-plus-circle"></i> &nbsp;Write Article</a>
    </div>
    <hr>
    <div class="mb-3">
        <form action="" method="GET" class="ms-auto d-flex" style="max-width: 300px">
            <input type="text" name="search" class="form-control form-control-sm me-1" value="{{request('search')??''}}"
                placeholder="Search articles">
            <button type="submit" class="btn btn-sm btn-primary text-white"><i class="bi bi-search"></i></button>
        </form>
    </div>
    @if (Session::has('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
    @endif
    <div class="overflow-auto">
        <table class="table  table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <th scope="row">#{{$article->id}}</th>
                    <td>{{Str::words($article->title, 5, '...')}}</td>
                    <td>{{Str::words($article->content, 5, '...')}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>{{\Carbon\Carbon::parse($article->publish_date)->toFormattedDateString()}}</td>
                    <td><img src="{{asset('storage/'.$article->image)}}" alt="Article Image" width="100px"></td>
                    <td>
                        <a href="{{route('articles.show',$article->id)}}"
                            class="mb-1 mb-md-0 btn btn-primary btn-sm text-white">Details</a>
                        <a href="{{route('articles.edit',$article->id)}}"
                            class="mb-1 mb-md-0 btn btn-secondary btn-sm text-white">Edit</a>
                        <button type="button" class="mb-1 mb-md-0 btn btn-danger btn-sm text-white"
                            data-bs-toggle="modal" data-bs-target="#model_{{$article->id}}">Delete</button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="model_{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger text-white"
                                    form="deletearticle{{$article->id}}">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('articles.destroy',$article->id)}}" class="d-none" method="POST"
                    id="deletearticle{{$article->id}}">
                    @csrf
                    @method('delete')
                </form>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        {{$articles->links()}}
    </div>
</div>
@endsection