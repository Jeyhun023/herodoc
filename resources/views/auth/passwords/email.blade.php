@extends('front.partials.app', ['title' => 'Şifrənin bərpası - Herodoc', 'description' => 'E-mail ünvanınızı yazaraq hesab şifrənizi bərpa edə bilərsiniz'])
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
                    @if (session('status'))
                        <p style="color:green">
                            {{ session('status') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> YENİLƏMƏ LİNKİ GÖNDƏR </button>
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
