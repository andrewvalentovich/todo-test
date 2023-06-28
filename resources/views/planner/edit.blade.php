@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">


                            <div class="row">
                                <div class="col-6">
                                    <form action="{{ route('planner.update', $planner->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group mb-4">
                                            <input type="text" value="{{ old('title') ?? $planner->title }}" name="title" class="form-control" placeholder="Наименование">
                                        </div>

                                        <div class="form-group mb-4">
                                            <select class="" id="tasks_tags1" name="author[]" data-placeholder="Выберите автора" style="width: 100%;">
                                                <option selected disabled value="{{ $planner->author->id }}">{{ $planner->author->email }}</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Apply">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 pt-5">
                                    <h4 class="text-center my-1 pb-1">Roles</h4>

                                    <div class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                        <div class="col-12">
                                            <a href="{{ route('role.create', $planner->id) }}" class="btn btn-primary">Share role</a>
                                        </div>
                                    </div>

                                    <table class="table mb-4">
                                        <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Roles</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <th>{{ $user->email }}</th>
                                                <td>{{ $user->role->name }}</td>
                                                <td>
                                                    <a href="{{ route('role.edit', $user->role->id) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('role.delete', $user->role->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
