@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add To Do') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form>
                        <div class="mb-3">
                          <label for="taskTitle" class="form-label">Task Title</label>
                          <input type="text" class="form-control" id="taskTitle" placeholder="Enter Task Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label">Task Description</label>
                            {{-- <input type="text" class="form-control" id="taskDescription" placeholder="Describe the task" required> --}}
                            <textarea class="form-control" id="taskDescription" rows="3" placeholder="Describe the task" required></textarea>    
                        </div>
                        <div class="mb-3">
                            <label for="taskPriority" class="form-label">Task Priority</label>
                                <select class="form-select" id="taskPriority" required>
                                    <option selected disabled>Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection