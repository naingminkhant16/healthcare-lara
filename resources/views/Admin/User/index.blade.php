@extends('layouts.Admin.layout')
@section('content')
<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-3 text-primary fw-bold">Users Management</h1>
    </div>
    <hr>
    <div class="mb-3">
        <form action="" method="GET" class="ms-auto d-flex" style="max-width: 300px">
            <input type="text" name="search" class="form-control form-control-sm me-1" value="{{request('search')??''}}"
                placeholder="Search users...">
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">#{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->is_admin)
                        <span class="badge text-bg-danger text-white">Admin</span>
                        @else
                        <span class="badge text-bg-primary text-white">User</span>
                        @endif
                        @if ($user->id!=auth()->id())
                        <form action="{{route('admin.users.changeRole',$user->id)}}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Change Role</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="mb-1 mb-md-0 btn btn-danger btn-sm text-white"
                            data-bs-toggle="modal" data-bs-target="#model_{{$user->id}}">Delete</button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="model_{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    form="deleteuser{{$user->id}}">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.users.destroy',$user->id)}}" class="d-none" method="POST"
                    id="deleteuser{{$user->id}}">
                    @csrf
                    @method('delete')
                </form>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        {{$users->links()}}
    </div>
</div>
@endsection