@extends('layouts.auth')
@section('content')
    <div class="card-body px-lg-5 py-lg-5">
                        <div class="card-header bg-transparent pb-5">
                            <div class="text-muted text-center mt-2 mb-4">
                                <small>{{__('Login by')}}</small>
                            </div>
                            <div class="text-center">
                                <a href="{{route('github')}}" class="btn btn-neutral btn-icon mr-4">
                                    <span class="btn-inner--icon"><img
                                                src="{{asset('img/icons/common/github.svg')}}"></span>
                                    <span class="btn-inner--text text-dark">Github</span>
                                </a>
                                <a href="#" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img
                                                src="{{asset('img/icons/common/google.svg')}}"></span>
                                    <span class="btn-inner--text text-dark">Google</span>
                                </a>
                            </div>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group  {{ $errors->has('email') ? 'has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative {{ $errors->has('email') ? 'is-invalid' : '' }}">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>

                                    <input class="form-control "
                                           placeholder="البريد الإلكتروني"
                                           name="email"
                                           type="email">

                                </div>
                                @if ($errors->has('email'))
                                    <span class="badge badge-pill badge-warning" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group  {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <div class="input-group input-group-alternative {{ $errors->has('password') ? 'is-invalid' : '' }}">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>

                                    <input class="form-control"
                                           placeholder="كلمة المرور"
                                           name="password"
                                           type="password">

                                </div>

                                @if ($errors->has('password'))
                                    <span class="badge badge-pill badge-warning" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}
                                       name="remember"
                                       type="checkbox">

                                <label class="custom-control-label" for="remember">
                                    <span class="text-muted">{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
@endsection
@section('footer')
    <div class="row mt-3">
        <div class="col-6">
            <a href="{{ route('password.request') }}" class="text-light">
                <small>
                    {{ __('Forgot Your Password?') }}
                </small>
            </a>
        </div>
        <div class="col-6 text-right">
            <a href="{{route('register')}}" class="text-light">
                <small>انشاء حساب جديد</small>
            </a>
        </div>
    </div>
@endsection