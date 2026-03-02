@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 m-5">
            <div class="">
                <div class="wecomebox" style="background: #800f0f">
                    <h2>Convocation Student Registration System</h2>
                    <h5>Sabaragamuwa University of Sri Lanka</h5>

                </div>
            </div>

            <div class="card" style="margin-top: 50px">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="">
                                    <label class="form-check-label" for="remember">
                                        {{ __('If you did not register to the system,') }}
                                    </label>
                                    <a class="form-check-label" href="{{ route('register') }}">{{ __('Click here Register to the system') }}</a>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            {{-- <a target="_blank" style="font-weight: bold" href="https://drive.google.com/drive/folders/1aiQIPxoFe-E3EzZ_axrltyMXSG-Wgguq?usp=sharing">Download The Guide</a> --}}
            <div style="font-weight: bold" class="mt-3">{{ __('Help Desk:') }}</div>
            {{-- <div style="font-weight: bold" class="">{{ __('Please download the guide and read it before calling us.') }}</div> --}}
            <div class="">{{ __('If you have any question about Registration:') }}</div>
            <div class="">{{ __('045-3135090') }}</div>
{{--            <div class="">{{ __('Lohara Chathumini - +94 71 42 24 324 ') }}</div>--}}
{{--            <div class="">{{ __('Ishan Randika - +94 71 57 57 700 (WhatsApp only)') }}</div>--}}

            {{--            <div class="">{{ __('If you have any question about Employability Survey:') }}</div>--}}
{{--            <div class="">{{ __('📱 Sameera: +94 71 43 87 876') }}</div>--}}

        </div>
    </div>
</div>
@endsection
