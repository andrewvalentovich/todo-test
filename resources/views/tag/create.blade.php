@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">Create tag</h4>

                            <div class="row">
                                <div class="col-6">

                                    <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group mb-4">
                                            <input type="text" name="title" class="form-control" placeholder="Наименование">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Apply">
                                            <a href="{{ route('tag.index') }}" class="btn btn-danger">Go index</a>
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
