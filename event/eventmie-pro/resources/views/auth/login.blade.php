@extends('eventmie::auth.authapp')

@section('title')
    @lang('eventmie-pro::em.login')
@endsection

@section('authcontent')
    <!-- card -->
    <div class="card shadow border-0">
        <!-- card body -->
        @if (config('voyager.demo_mode'))
            <div class="alert alert-info">
                <a href="https://eventmie-pro-docs.classiebit.com/docs/2.0/demo-accounts" target="_blank">
                    @lang('eventmie-pro::em.visit_accounts')
                </a>
            </div>
        @endif

        <div class="card-body p-5">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <span role="alert">
                                    <strong>{{ $error }}</strong>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3 class="mb-4">@lang('eventmie-pro::em.login')</h3>
            <!-- form -->
            <form method="POST" action="{{ route('eventmie.login_post') }}">
                <!-- email -->
                <div class="mb-3">
                    <label for="email" class="form-label">@lang('eventmie-pro::em.email_address')</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input id="email" type="email"
                        class="wpcf7-form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required autofocus placeholder="@lang('eventmie-pro::em.email')">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>
                <!-- password -->
                <div class="mb-3">
                    <label for="password" class="form-label">@lang('eventmie-pro::em.password')</label>
                    <input id="password" type="password"
                        class="wpcf7-form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password" required placeholder="@lang('eventmie-pro::em.password')">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="d-flex justify-content-between mb-2 pb-2 mt-3 text-sm ">
                    <!-- form check -->
                    <div class="form-check ">
                        <input class="form-check-input bg-warning border-warning" type="checkbox" name="remember" id="remember" checked value="1">
                        <label class="form-check-label" for="remember">@lang('eventmie-pro::em.remember')</label>
                    </div>
                    <!-- forgot password -->
                    <div class="fw-bold">
                        <a href="{{ route('eventmie.password.request') }}" class="text-inherit"> @lang('eventmie-pro::em.forgot_password')</a>
                    </div>

                </div>
                <!-- button -->
                <button type="submit" class="btn btn-warning btn-block">@lang('eventmie-pro::em.login') <i
                        class="fas fa-sign-in-alt"></i></button>
            </form>
            <div class="mt-4">
                <p class="mb-0">@lang('eventmie-pro::em.donot_account')<a class="text-danger" href="{{ route('eventmie.register_show') }}">
                        @lang('eventmie-pro::em.register')</a></p>
            </div>
            <div class="mt-3">
                <hr style="border-top: 2px solid #eee;">
                @if (!empty(config('services')['facebook']['client_id']) || !empty(config('services')['google']['client_id']))
                    <div class="d-flex justify-content-between mb-2 pb-2 mt-3 text-sm">
                        <div class="text-left">
                            <span>@lang('eventmie-pro::em.continue_with')</span>
                        </div>
                        <div class="text-right">
                            @if (!empty(config('services')['facebook']['client_id']))
                                <a href="{{ route('eventmie.oauth_login', ['social' => 'facebook']) }}"
                                    class="btn btn-sm btn-primary btn-block"><i class="fab fa-facebook-f"></i>
                                    @lang('eventmie-pro::em.facebook')</a>
                            @endif

                            @if (!empty(config('services')['google']['client_id']))
                                <a href="{{ route('eventmie.oauth_login', ['social' => 'google']) }}"
                                    class="btn btn-sm btn-primary btn-block"><i class="fab fa-google"></i>
                                    @lang('eventmie-pro::em.google')</a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>


@endsection
