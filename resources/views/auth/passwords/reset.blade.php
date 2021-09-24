@extends('front.partials.app', ['title' => 'Şifrənin bərpası - Herodoc', 'description' => 'Yeni şifrənizi yazaraq hesab məlumatlarınızı dəyişə bilərsiniz'])
@section('content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="{{route('index')}}"><img src="/front/images/logo.png" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Şifrənin bərpası</h5>
                    </div>
                    @if(session('error'))
                        <p style="color:red">
                            {{ session('error') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="mb-1">Email</label>
                            <div class="position-relative icon-form-control">
                                <i class="mdi mdi-account position-absolute"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <strong style="color:red">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Şifrə</label>
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
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> TƏSDİQ ET </button>
                        <div class="py-3 d-flex align-item-center">
                            <a href="{{ route('login') }}">Giriş et</a>
                            <span class="ml-auto"> <a href="{{ route('register') }}">Qeydiyyatdan keç</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
