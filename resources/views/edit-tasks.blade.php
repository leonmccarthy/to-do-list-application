@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit To Do Task') }}</div>

                <div class="card-body">

                    {{-- SHOWING ERRORS PRESENT FROM VALIDATION--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- SHOWING SINGLE ERROR FOR EXISTING TASK --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>    
                    @endif

                    <form method="POST" enctype="multipart/form-data" action="{{ route('edit-task-action', $task->id) }}">
                        @csrf
                        <div class="mb-3">
                          <label for="taskTitle" class="form-label">Task Title</label>
                          <input name="taskTitle" type="text" class="form-control" id="taskTitle" placeholder="Enter Task Title" required value="{{ $task->taskTitle }}">
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label">Task Description</label>
                            <textarea name="taskDescription" class="form-control" id="taskDescription" rows="3" placeholder="Describe the task">{{ $task->taskDescription }}</textarea>    
                        </div>
                        <div class="mb-3">
                            <label for="taskPriority" class="form-label">Task Priority</label>
                                <select name="taskPriority" class="form-select" id="taskPriority" required>
                                    <option disabled>Select Priority</option>
                                    @if ($task->taskPriority == 'low')
                                        <option selected value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    @elseif ($task->taskPriority == 'medium')
                                        <option value="low">Low</option>
                                        <option selected value="medium">Medium</option>
                                        <option value="high">High</option>
                                    @elseif ($task->taskPriority == 'high')
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option selected value="high">High</option>
                                    @endif
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Task</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection