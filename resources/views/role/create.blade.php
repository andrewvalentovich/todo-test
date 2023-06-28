@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">Share Role</h4>

                            <div class="row">
                                <div class="col-6">

                                    <form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="planner_id" value="{{ $planner_id }}">
                                        <div class="form-group mb-4">
                                            <select name="user_id" class="form-control select" style="width: 100%;">
                                                <option selected="selected" disabled>Выберите пользователя</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-4">
                                            <select name="name" class="form-control select" style="width: 100%;">
                                                <option selected="selected" disabled>Выберите роль</option>
                                                @foreach($roles as $id => $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Apply">
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
