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
                            <form id="addPlannerForm" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="text" name="title" id="form-title" class="form-control" placeholder="Enter a title here" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="author_id" value="{{ auth()->user()->getAuthIdentifier() }}">
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
                                    <button id="addPlannerButton" type="submit" class="btn btn-primary">Add planner</button>
                                </div>
                            </form>

                            <table class="table mb-4">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Todo planner</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($planners as $planner)
                                        @canany(['show-planner', 'show-roles-read'], $planner)
                                        <tr>
                                            <th scope="row">{{ $planner->id }}</th>
                                            <td>{{ $planner->getAuthor->email }}</td>
                                            <td>{{ $planner->title }}</td>
                                            <td>
                                                @can('show-roles-read', $planner)
                                                    <a href="{{ route('planner.show', $planner->id) }}" class="btn btn-primary">Show</a>
                                                @endcan
                                                @canany(['show-planner', 'show-roles-edit'], $planner)
                                                    <a href="{{ route('planner.edit', $planner->id) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('planner.delete', $planner->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endcan
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
            $('#addPlannerButton').on('click', function (e) {
                e.preventDefault();
                var form = $('#addPlannerForm');
                var msg = form.serialize();
                console.log(msg);
                $.ajax({
                    type: 'POST',
                    url: '/api/planner/store', // Обработчик
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
