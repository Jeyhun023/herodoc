@extends('front.partials.app', ['title' => 'Profil - Herodoc', 'description' => 'Hesab məlumatlarınızız üzərində düzəliş edə bilərsiniz'])
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white rounded shadow-sm sidebar-page-right">
                    <div>
                        <div class="p-3 border-bottom">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p style="color:red">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{route('user.account.save')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$user->image}}">
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">PROFİL ŞƏKLİ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <img src="{{$user->image}}" width="150">
                                        <input type="file" name="image" style="width: 250px;"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">AD VƏ SOYAD</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="fullname"
                                            class="form-control font-weight-bold text-muted" value="{{$user->fullname}}">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">İSTİFADƏÇİ ADI</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="username"
                                            class="form-control font-weight-bold text-muted" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">EMAIL</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email"
                                            class="form-control font-weight-bold text-muted"
                                            value="{{$user->email}}">
                                    </div>
                                </div>
                                @if(session()->has('save'))
                                    <p style="text-align: right;font-size: 15px;color: green;margin-top: 10px;">
                                        Məlumatlarınız dəyişdirildi
                                    </p>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-success">Yadda saxla</button>
                                </div>
                            </form>
                        </div>
                        <div class="p-3">
                            <form action="{{route('user.account.pass')}}" method="POST">
                                @csrf
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">KÖHNƏ ŞİFRƏ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="old_pass"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">YENİ ŞİFRƏ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="new_pass"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">YENİ ŞİFRƏ TƏKRARI</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="new_pass_r"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                @if(session()->has('new_pass_r'))
                                    <p style="text-align: right;font-size: 15px;color: red;margin-top: 10px;">
                                        Şifrələr uyğun gəlmir
                                    </p>
                                @endif
                                @if(session()->has('old_pass'))
                                    <p style="text-align: right;font-size: 15px;color: red;margin-top: 10px;">
                                        Köhnə şifrə düz deyil
                                    </p>
                                @endif
                                @if(session()->has('pass_succ'))
                                    <p style="text-align: right;font-size: 15px;color: green;margin-top: 10px;">
                                        Şifrəniz dəyişdirildi
                                    </p>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-success">Şifrəni dəyiş</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection