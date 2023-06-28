@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">Edit role</h4>

                            <div class="row">
                                <div class="col-6">

                                    <form action="{{ route('role.update', $role->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("patch")
                                        <div class="form-group mb-4">
                                            <select name="user_id" class="form-control select" style="width: 100%;">
                                                <option selected="selected" value="{{ $role->user->id }}" disabled>{{ $role->user->email }}</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-4">
                                            <select name="name" class="form-control select" style="width: 100%;">
                                                <option selected="selected" disabled>Выберите роль</option>
                                                @foreach($roles as $id => $getRole)
                                                    @if($getRole == $role->name)
                                                        <option selected value="{{ $getRole }}">{{ $getRole }}</option>
                                                    @else
                                                        <option value="{{ $getRole }}">{{ $getRole }}</option>
                                                    @endif
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
