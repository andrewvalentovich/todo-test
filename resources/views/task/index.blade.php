@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>
                            <h6 class="text-center my-1 pb-1">Create</h6>
                            <form id="addTaskForm" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="text" name="title" id="form-title" class="form-control" placeholder="Enter a title here" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <select name="status" class="form-control">
                                        <option selected="selected" disabled>Выберите статус</option>
                                        @foreach($statuses as $id => $status)
                                            <option selected value="{{ $id }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                <div class="col-12">--}}
{{--                                    <input type="file" name="image" class="custom-file-input d-inline-block" id="image">--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <select class="" id="tasks_tags1" name="tags[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">--}}
{{--                                        <option selected value="">Нет тэгов</option>--}}
{{--                                        @foreach($tags as $tag)--}}
{{--                                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="col-12">
                                    <button id="addTaskButton" type="submit" class="btn btn-primary">Add task</button>
                                </div>
                            </form>

                            <form class="pb-5" method="get" action="{{ route('task.index') }}">
                                <div class="form-group pb-2">
                                    <h6 class="text-center my-1 pb-1">Search & Filter</h6>
                                </div>
                                <div class="form-group pb-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        id="inputSearchTitle"
                                        aria-describedby="title"
                                        placeholder="Search with title"
                                        value="{{ isset($_GET['title']) ? $_GET['title'] : '' }}"
                                    >
                                </div>
                                <div class="form-group pb-2">
                                    @foreach($tags as $tag)
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                name="tags[]"
                                                type="checkbox"
                                                id="{{ $tag->title . '-' . $tag->id }}"
                                                value="{{ $tag->id }}"
                                                @if(isset($_GET['tags']))
                                                    {{ in_array($tag->id ,$_GET['tags']) ? 'checked' : '' }}
                                                @endif
                                            >
                                            <label class="form-check-label" for="{{ $tag->title . '-' . $tag->id }}">{{ $tag->title }}</label>
                                        </div>
                                    @endforeach
                                    <button id="addTaskButton" type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>

                            <table class="table mb-4">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Todo item</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <th scope="row">{{ $task->id }}</th>
                                            <td>
                                                @if(isset($task->image))
                                                    <a href="{{ asset('storage/' . $task->image) }}" target="_blank"><img src="{{ asset('storage/' . $task->preview_image) }}" alt=""></a>
                                                @endif
                                            </td>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $statuses[$task->status] }}</td>
                                            <td>
                                                @if(isset($task->tags))
                                                    @foreach($task->tags as $id => $tag)
                                                        @if($id < count($task->tags) - 1)
                                                            {{ $tag->title . ',' }}
                                                        @else
                                                            {{ $tag->title }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary">Edit</a>
{{--                                                <form action="{{ route('task.delete', $task->id) }}" method="post" style="display: inline-block;">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <input type="submit" class="btn btn-danger" value="Delete">--}}
{{--                                                </form>--}}
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
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#addTaskButton').on('click', function (e) {
                e.preventDefault();
                var form = $('#addTaskForm');
                var msg = form.serialize();
                console.log(msg);
                $.ajax({
                    type: 'POST',
                    url: '/api/task/store', // Обработчик
                    data: msg,
                    success: function(data) {
                        console.log('Успех!');
                        console.log(data);
                    },
                    error:  function(data){
                        console.log('Ошибка!');
                        console.log(data);
                    }
                });
            })
        });
    </script>
@endsection
