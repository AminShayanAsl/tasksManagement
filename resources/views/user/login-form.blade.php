<form action="{{ $action }}" method="POST" class="{{ $class }}">
    {{ csrf_field() }}
    <div>
        @include('common.input', ['type' => 'email', 'name' => 'email', 'placeholder' => __('user.email'), 'class' => 'form-control my-3', 'required' => 'required'])
    </div>
    <div class="d-flex">
        @include('common.input', ['type' => 'password', 'name' => 'password', 'placeholder' => __('user.password'), 'class' => 'form-control my-3', 'required' => 'required'])
    </div>
    <div dir="ltr">
        @include('common.button', ['type' => 'submit', 'value' => __('user.login'), 'class' => 'btn btn-outline-primary my-3'])
    </div>
</form>
