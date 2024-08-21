<form action="{{ route('update-task', $task['id']) }}" method="POST" class="my-5">
    {{ csrf_field() }}
    <div>
        @include('common.input', ['type' => 'text', 'name' => 'title', 'placeholder' => __('task.title'), 'class' => 'form-control my-3', 'required' => 'required', 'value' => $task['title']])
    </div>
    <div class="d-flex">
        @include('common.textarea', ['name' => 'explanation', 'placeholder' => __('task.explanation'), 'class' => 'form-control my-3', 'required' => 'required', 'value' => $task['explanation']])
    </div>
    <div class="d-flex justify-content-around my-3">
        @include('common.select', ['name' => 'status', 'class' => 'form-select ms-2', 'default' => ['key' => $task['status'], 'value' => \App\Entities\Task::getStatusTypes()[$task['status']]], 'options' => \App\Entities\Task::getStatusTypes()])
        @include('common.select', ['name' => 'priority', 'class' => 'form-select mx-2', 'default' => ['key' => $task['priority'], 'value' => \App\Entities\Task::getPriorityTypes()[$task['priority']]], 'options' => \App\Entities\Task::getPriorityTypes()])
        @include('common.jdp', ['name' => 'deadline', 'class' => 'jdp form-control me-2', 'minDate' => 'today', 'placeholder' => __('task.deadline'), 'value' => verta($task['deadline'])->format('Y/m/d')])
    </div>
    <div dir="ltr">
        @include('common.button', ['type' => 'submit', 'value' => __('task.update'), 'class' => 'btn btn-outline-primary my-3'])
    </div>
</form>
