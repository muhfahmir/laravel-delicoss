@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Edit Product</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.product.update', ['product_id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group" style="height: 200px; width: 200px;">
                                    <label for="image_url" class="frame" id="frameImage"
                                        style="width: 100%;height:100%;cursor: pointer">
                                        <img src="{{ asset('image/product').'/'.$product->image_url }}" width="100%" height="100%"
                                            style="border-radius: 5px;">
                                    </label>
                                    <input type="file" id="image_url" name="image_url" style="opacity: 0;">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $product->name }}" placeholder="Nama Product">
                                    @if ($errors->has('name'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="product_category_id">Jenis Produk</label>
                                    <select class="form-control" id="product_category_id" name="product_category_id">
                                        <option value=""></option>
                                        @foreach ($productCategories as $productCategory)
                                            <option
                                                {{ $productCategory->id == $product->product_category_id ? 'selected' : '' }}
                                                value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" class="form-control" id="size" name="size"
                                        value="{{ $product->size }}" placeholder="Size Product">
                                    @if ($errors->has('size'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('size') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price">Harga Produk</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $product->price }}" placeholder="Harga Product">
                                    @if ($errors->has('price'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">Back</a>
                                    <button type="submit" class="btn btn-primary mx-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('after-js')
    <script>
        $(document).ready(function() {
            $('#product_category_id').select2({
                placeholder: "Pilih Jenis Produk"
            });
        })

        $('#image_url').change(function() {
            let foto = readURL(this);
            foto.onload = function(e) {
                $('#frameImage').html(
                    `<div class="position-relative w-100 h-100" >
                        <img src="${e.target.result}" alt="..." width="100%" height="100%" style="border-radius: 5px;">
                        <a href="#" class="close-img" style="display: flex;position: absolute;background-color: white;height: 40px;width: 40px;justify-content: center;align-items: center;border-radius: 50%;box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);top: -15px;text-decoration: none !important;right: -15px;">
                        <i class="fa fa-times"></i>
                        </a>
                    </div>
                    
                    `
                );
            };
        })
        $("#frameImage").on("click", ".close-img", function() {
            $('#frameImage').html(
                '<img src="{{ asset('image/default-image.jpg') }}" width="100%" height="100%" style="border-radius: 5px;">'
            )
            $('#image_url').val('')
        });
    </script>
@endpush

@push('after-js')
<script>
    $(document).ready(function() {
        $('#product_category_id').select2({
            placeholder: "Pilih Jenis Produk"
        });
    })

    let photo = '{{ $product->image_url }}';
        if(photo == ''){
            $('#frameImage').html(
                `<img src="{{ asset('img/avatar.jpg')}}" width="100%" height="100%"
                                            style="border-radius: 5px;">`
            );
        }else{
            $('#frameImage').html(
            `<div class="position-relative w-100 h-100" >
                        <img src="{{ asset('image/product/${photo}') }}" alt="..." width="100%" height="100%" style="border-radius: 5px;">
                        <a href="#" class="close-img" style="display: flex;position: absolute;background-color: white;height: 40px;width: 40px;justify-content: center;align-items: center;border-radius: 50%;box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);top: -15px;text-decoration: none !important;right: -15px;">
                        <i class="fa fa-times"></i>
                        </a>
                    </div>`);
        }

    $('#image_url').change(function() {
        let foto = readURL(this);
        foto.onload = function(e) {
            $('#frameImage').html(
                `<div class="position-relative w-100 h-100" >
                    <img src="${e.target.result}" alt="..." width="100%" height="100%" style="border-radius: 5px;">
                    <a href="#" class="close-img" style="display: flex;position: absolute;background-color: white;height: 40px;width: 40px;justify-content: center;align-items: center;border-radius: 50%;box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);top: -15px;text-decoration: none !important;right: -15px;">
                    <i class="fa fa-times"></i>
                    </a>
                </div>
                
                `
            );
        };
    })
    $("#frameImage").on("click", ".close-img", function() {
        $('#frameImage').html(
            '<img src="{{ asset('image/default-image.jpg') }}" width="100%" height="100%" style="border-radius: 5px;">'
            )
        $('#image_url').val('')
    });
</script>
@endpush