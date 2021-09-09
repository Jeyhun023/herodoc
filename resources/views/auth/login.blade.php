@extends('front.partials.app')
@section('content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="{{route('index')}}"><img src="/front/images/logo.png" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Giriş et</h5>
                        <p class="text-muted">Don't miss your next opportunity. Sign in to stay updated on your
                            professional world.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Email</label>
                            <div class="position-relative icon-form-control">
                                <i class="mdi mdi-account position-absolute"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <strong style="color:red">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Şifrə</label>
                            <div class="position-relative icon-form-control">
                                <i class="mdi mdi-key-variant position-absolute"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <strong style="color:red">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">Yadda saxla</label>
                        </div>
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> GİRİŞ ET </button>
                        <div class="py-3 d-flex align-item-center">
                            <a href="{{ route('password.request') }}">Şifrəni unutmusan?</a>
                            <span class="ml-auto"> <a href="{{ route('register') }}">Qeydiyyatdan keç</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
