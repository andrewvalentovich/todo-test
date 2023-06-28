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
                                                <option selected disabled value="{{ $user->id }}">{{ $user->email }}</option>
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
