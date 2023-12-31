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

                                    <form action="{{ route('task.image.update', $task->id) }}" method="post" class="mb-2" style="display: inline-block;">
                                        @csrf
                                        @method('patch')
                                        <input type="submit" class="btn btn-danger" value="Delete image">
                                    </form>

                                    <form action="{{ route('task.update', $task->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')

                                        <input type="hidden" name="id" value="{{ $task->id }}">

                                        @if(isset($task->preview_image))
                                            <div class="form-group mb-4">
                                                <img src="{{ asset('storage/' . $task->preview_image) }}" alt="preview_image"/>
                                            </div>
                                        @endif
                                        @if(isset($task->image))
                                            <div class="form-group mb-4">
                                                <img src="{{ asset('storage/' . $task->image) }}" alt="image" style="max-height: 400px; max-width: 400px;"/>
                                            </div>
                                        @endif

                                        <div class="form-group mb-4">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="product_images">Выберите фотографию таска</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <input type="text" value="{{ old('title') ?? $task->title }}" name="title" class="form-control" placeholder="Наименование">
                                        </div>

                                        <select name="status" class="form-control mb-4">
                                            @foreach($statuses as $id => $status)
                                                <option {{ $task->status == $id ? 'selected' : '' }} value="{{ $id }}">{{ $status }}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-group">
                                            <select class="" id="tasks_tags1" name="tags[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                                @foreach($tags as $tag)
                                                    @if(in_array($tag->id, $task->tags->pluck('id')->toArray()))
                                                        <option selected value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                    @else
                                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
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
