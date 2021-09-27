@extends('front.partials.app', ['title' => '404 Xəta baş verdi', 'description' => 'Axtardığınız səhifə tapılmadı'])
@section('content')
<section class="py-5 bg-white border-top border-bottom">
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-8 col-md-8 mx-auto text-center">
                <h1><img class="img-fluid" src="{{asset('/front/images/404.png')}}" alt="404"></h1>
                <h1>Axtardığınız səhifə tapılmadı</h1>
                <p class="land">Daxil olmağa çalışdığını səhifə silinmiş və ya dəyişdirilmiş ola bilər.</p>
                <div class="mt-5">
                    <a href="{{route('index')}}" class="btn btn-success"><i class="mdi mdi-home"></i> Geri qayıt</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection