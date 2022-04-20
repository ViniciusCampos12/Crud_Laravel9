@extends('layouts.base')


@section('title', 'Login')

@section('conteudo')

    <main>
        <h1 align="center">Login</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Logue com email e senha!') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Entrar') }}
                                        </button>
                                        <button type="button" class="btn btn-outline-dark"
                                            onclick=" location.href='{{ route('redirect', ['provider' => 'github']) }}'">
                                            <i class="fa fa-github" style="font-size:15px"> </i>
                                            {{ __('Login com GitHub') }}
                                        </button>
                                        <button type="button" class="btn btn-outline-danger"
                                            onclick=" location.href='{{ route('redirect', ['provider' => 'google']) }}'"><img width="15px" style="margin-bottom:3px; margin-right:5px" alt="Google login" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                            {{ __('Login com Google') }}
                                        </button>
                                    </div>

                                    <br><br>
                                    <button type="button" class="btn btn-outline-success"
                                        onclick=" location.href='{{ route('register') }}'">
                                        {{ __('Criar nova conta') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
