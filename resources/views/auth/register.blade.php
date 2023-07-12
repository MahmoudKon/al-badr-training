@extends('layouts.auth')

@section('content')
<div class="card card-md">
    <div class="card-body">
        <h2 class="h2 text-center mb-4">{{ __('Register') }}</h2>
        <form method="POST" action="{{ route('register') }}" autocomplete="off" novalidate>
            @csrf

            <div class="mb-3">
                <label class="form-label required">Username</label>
                <input type="text" class="form-control" placeholder="Type your username..." name="username" autocomplete="off" value="{{ old('username', env('LOGIN_NAME')) }}" required>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'username'])
            </div>

            <div class="mb-3">
                <label class="form-label required">Email</label>
                <input type="email" class="form-control" placeholder="Type your email..." name="email" autocomplete="off" value="{{ old('email', env('LOGIN_EMAIL')) }}" required>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'email'])
            </div>

            <div class="mb-2">
                <label class="form-label required"> Password </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control password" placeholder="Your password" autocomplete="off" name="password" autocomplete="off" value="{{ env('LOGIN_PASS') }}" required>
                    <span class="input-group-text">
                        <a href="#" class="link-secondary show-password" data-show='false' title="Show password" data-bs-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                    </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
            </div>

            <div class="mb-2">
                <label class="form-label required"> Confirm Password </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control password" placeholder="Your password" autocomplete="off" name="password_confirmation" autocomplete="off" value="{{ env('LOGIN_PASS') }}" required>
                    <span class="input-group-text">
                        <a href="#" class="link-secondary show-password" data-show='false' title="Show password" data-bs-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                    </span>
                </div>
                @include('layouts.includes.dashboard.validation-error', ['input' => 'password_confirmation'])
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function() {
            $('body').on('click', '.show-password', function(e) {
                e.preventDefault();
                $(this).data('show', ! $(this).data('show'));
                let type = $(this).data('show') ? 'text' : 'password';
                $(this).closest('.input-group').find('input.password').attr('type', type);
            });
        });
    </script>
@endsection
