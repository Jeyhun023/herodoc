@extends('front.partials.app', ['title' => 'Mənim elanlarım - Herodoc', 'description' => 'Sizə məxsus olan elanları görə bilərsiniz'])
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
                            <form action="{{route('account.adverts.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ŞƏKİL (800x615)</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="image"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ELAN ADI</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="name"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">KATEQORİYA</p>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="category_id">
                                            <option disabled selected>--Birini seçin--</option>
                                            @foreach($categories as $category)
                                                    <option disabled>{{$category->name}}</option>
                                                @foreach($category->subcat as $subcat)
                                                    <option value="{{$subcat->id}}">-{{$subcat->name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">QİYMƏT</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="price"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ÇATDIRILMA</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="delivery"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">QISA MƏLUMAT</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" style="resize:none" name="short_desc" id="exampleFormControlTextarea1" rows="7"
                                            placeholder="Məlumat..." required></textarea> 
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">KONTENT</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="editor" name="content"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-success">Yadda saxla</button>
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
@push('js')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
      height: 400,
      baseFloatZIndex: 10005,
      removeButtons: 'PasteFromWord,Styles,Format'
    });
</script>
@endpush