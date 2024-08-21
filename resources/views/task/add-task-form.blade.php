<form wire:submit="{{ $wire_submit }}" class="{{ $class }}">
    {{ csrf_field() }}
    <div>
        @include('common.input', ['type' => 'text', 'wire_model' => 'title', 'placeholder' => __('task.title'), 'class' => 'form-control my-3', 'required' => 'required'])
    </div>
    <div class="d-flex">
        @include('common.textarea', ['wire_model' => 'explanation', 'placeholder' => __('task.explanation'), 'class' => 'form-control my-3', 'required' => 'required'])
    </div>
    <div class="d-flex justify-content-around my-3">
        @include('common.select', ['wire_model' => 'status', 'class' => 'form-select ms-2', 'default' => ['key' => '', 'value' => __('task.status')], 'options' => \App\Entities\Task::getStatusTypes()])
        @include('common.select', ['wire_model' => 'priority', 'class' => 'form-select mx-2', 'default' => ['key' => '', 'value' => __('task.priority')], 'options' => \App\Entities\Task::getPriorityTypes()])
        @include('common.jdp', ['wire_model' => 'deadline', 'class' => 'jdp form-control me-2', 'minDate' => 'today', 'placeholder' => __('task.deadline')])
    </div>
    <div dir="ltr">
        @include('common.button', ['type' => 'submit', 'value' => __('task.add'), 'class' => 'btn btn-outline-success my-3'])
    </div>
</form>
