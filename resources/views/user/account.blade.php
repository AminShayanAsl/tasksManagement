@extends('layout.layout')

@section('content')
    <div class="mx-auto my-5 w-75">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="#login" role="tab" data-toggle="tab" class="nav-link active text-dark"> ورود </a>
            </li>
            <li class="nav-item">
                <a href="#signup" role="tab" data-toggle="tab" class="nav-link text-dark"> ثبت نام </a>
            </li>
        </ul>
        <div class="border border-top-0 rounded-bottom-3 tab-content p-3">
            <div class="tab-pane active" role="tabpanel" id="login">
                @include('user.login-form', ['action' => route('login'), 'class' => 'm-auto w-50'])
            </div>
            <div class="tab-pane" role="tabpanel" id="signup">
                @include('user.signup-form', ['action' => route('signup'), 'class' => 'm-auto w-50'])
            </div>
        </div>
    </div>
@endsection
