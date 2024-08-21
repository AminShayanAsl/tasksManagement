<div>
    <div class="collapse" id="add-task-form">
        @include('task.add-task-form', ['wire_submit' => 'save', 'class' => 'border-bottom my-3'])
    </div>

    <div class="d-flex justify-content-around mb-5">
        @foreach(\App\Entities\Task::getStatusTypes() as $key => $status)
            <div class="col-3 mx-2">
                <h5 class="border-bottom text-center py-2">{{ $status }}</h5>
                <ul class="list-group tasks-list" id="{{ $key }}">
                    @foreach($tasks as $task)
                        @if($task['status'] == $status)
                            <li class="list-group-item cursor-grab border rounded-3 my-2 text-center py-3" data-task-id="{{ $task['id'] }}">
                                <div class="title my-2">{{ $task['title'] }}</div>
                                <div class="explanation my-2">{{ $task['explanation'] }}</div>
                                <div class="deadline my-2">{{ $task['deadline'] }}</div>
                                <div class="priority my-2">
                                    <span class="{{ array_search($task['priority'], \App\Entities\Task::getPriorityTypes()) }} px-2 py-1 rounded-4">{{ __('task.priority').' '.$task['priority'] }}</span>
                                </div>
                                <div class="username my-2">{{ $task['username'] }}</div>
                                <a href="{{ route('task-detail', $task['id']) }}" target="_blank">{{ __('task.detail') }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
