@extends('front.partials.app')
@section('content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="{{route('index')}}"><img src="/front/images/logo.png" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Qeydiyyatdan keç</h5>
                        <p class="text-muted">Make the most of your professional life</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mb-1">Adınız və soyadınız</label>
                                    <div class="position-relative icon-form-control">
                                        <i class="mdi mdi-account position-absolute"></i>
                                        <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>
                                    </div>
                                    @error('fullname')
                                        <strong style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mb-1">İstifadəçi adı</label>
                                    <div class="position-relative">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>
                                    @error('username')
                                        <strong style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Email</label>
                            <div class="position-relative icon-form-control">
                                <i class="mdi mdi-email-outline position-absolute"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @error('email')
                                <strong style="color:red">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Şifrə (6 vəya daha çox)</label>
                            <div class="position-relative icon-form-control">
                                <i class="mdi mdi-key-variant position-absolute"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                                <strong style="color:red">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Şifrə təkrarı</label>
                            <div class="position-relative icon-form-control">
                                <i class="mdi mdi-key-variant position-absolute"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mb-1">
                                <input type="checkbox" checked disabled>
                                <a href="#">Qaydalar və şərtlər</a> ilə razıyam
                            </label>
                        </div>
                        <button class="btn btn-success btn-block text-uppercase" type="submit">QEYDİYYAT</button>
                        <div class="py-3 d-flex align-item-center">
                            <a href="{{ route('password.request') }}">Şifrəni unutmusan?</a>
                            <span class="ml-auto"> <a href="{{ route('login') }}">Giriş et</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
