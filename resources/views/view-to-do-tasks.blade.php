@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tasks as $task)
                            <tr>
                              <th scope="row">{{ $task->taskTitle }}</th>
                              <td>{{ $task->taskDescription }}</td>
                              @if ($task->taskPriority == 'high')
                                <td><span class="badge rounded-pill text-bg-danger">High</span></td>
                              @elseif ($task->taskPriority == 'medium')
                                <td><span class="badge rounded-pill text-bg-warning">Medium</span></td>
                              @elseif ($task->taskPriority == 'low')
                                <td><span class="badge rounded-pill text-bg-success">Low</span></td>
                              @endif

                              <td>
                                <a href="{{ route('edit-task-view', $task->id) }}" class="btn btn-outline-primary">Edit</a>
                                <a href="#" class="btn btn-outline-danger">Delete</a>
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
@endsection