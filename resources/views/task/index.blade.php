@extends('layouts.app')

@section('content')
    <div class="card-body">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>

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
                                <div class="col-12">
                                    <button id="addTaskButton" type="submit" class="btn btn-primary">Add task</button>
                                </div>
{{--                                                <div class="col-12">--}}
{{--                                                    <button type="submit" class="btn btn-warning">Get tasks</button>--}}
{{--                                                </div>--}}
                            </form>
                            <table class="table mb-4">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Todo item</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <th scope="row">{{ $task->id }}</th>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>
                                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('task.delete', $task->id) }}" method="post" style="display: inline-block;">
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
                    url: '/api/task/store', // Обработчик собственно
                    data: msg,
                    success: function(data) {
                        console.log('Успех!');
                        console.log(data);
                    },
                    error:  function(){
                        console.log('Ошибка!');
                        console.log(data);
                    }
                });
            })
        });
    </script>
@endsection
