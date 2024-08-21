@extends('layout.layout')

@section('content')
    @if(auth()->check())
        <div class="d-flex justify-content-between border-bottom mt-5 pb-2">
            <h4>{{ __('task.tasks-list') }}</h4>
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#add-task-form" aria-expanded="false" aria-controls="add-task-form">{{ __('task.create-task') }}</button>
        </div>
        @livewire('task')
    @else
        <div class="my-5 text-center">
            <h3>
                <b>Task Management</b>
                {{ __('task.slogan') }}
            </h3>
            <h5 class="my-3">{{ __('user.login-required') }}</h5>
            <img src="{{ asset('images/tasks.png') }}">
        </div>
    @endif

    @include('script.drag-and-drop')
@endsection
