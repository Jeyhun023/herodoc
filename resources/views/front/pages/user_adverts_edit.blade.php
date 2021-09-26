@extends('front.partials.app', ['title' => $advert->name, 'description' => 'Elan üzərində düzəliş edə bilərsiniz'])
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
                            @if(session()->has('success'))
                                <p style="text-align: right;font-size: 15px;color: green;margin-top: 10px;">
                                    Məlumatlarınız dəyişdirildi
                                </p>
                            @endif
                            <form action="{{route('account.adverts.update', ['advert' => $advert->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ŞƏKİL (800x615)</p>
                                    </div>
                                    <div class="col-md-8">
                                        <img src="{{$advert->image}}" width="150">
                                        <input type="file" name="image"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ELAN ADI</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="{{$advert->name}}"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">KATEQORİYA</p>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="category_id">
                                            <option disabled>--Birini seçin--</option>
                                            @foreach($categories as $category)
                                                    <option disabled>{{$category->name}}</option>
                                                @foreach($category->subcat as $subcat)
                                                    <option value="{{$subcat->id}}" @if($category->id == $advert->category_id) selected @endif>-{{$subcat->name}}</option>
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
                                        <input type="number" name="price" value="{{$advert->price}}"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ÇATDIRILMA</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="delivery"  value="{{$advert->delivery}}"
                                            class="form-control font-weight-bold text-muted" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">QISA MƏLUMAT</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" style="resize:none" name="short_desc" id="exampleFormControlTextarea1" rows="7"
                                            placeholder="Məlumat..." required>{{$advert->short_desc}}</textarea> 
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">KONTENT</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="editor" name="content">{{$advert->content}}</textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush