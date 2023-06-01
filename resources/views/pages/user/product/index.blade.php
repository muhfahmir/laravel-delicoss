@extends('layouts.app');

@section('content')
    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Shop By, {{ Auth::user()->fullname }}</h1>
        </div>

        <div class="section-body">
            @include('partials.user.flash_message')
            <div class="row">
                <div class="col-3">
                    <h1>Jenis Kategori</h1>
                    <p>Deskripsi Singkat</p>
                </div>
                <div class="col-9">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card card-product">
                                            <img class="card-img-top"
                                                src="{{ asset('image/product') . '/' . $product->image_url }}"
                                                alt="Card image cap" height="150">
                                            <div class="card-body">
                                                <p class="card-text">IDR {{ $product->price }}</p>
                                                <p class="card-text"> {{ $product->size }}</p>
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <p class="card-text"> Deskripsi</p>

                                                <a href="#" class="btn btn-primary" data-id="{{ $product->id }}"
                                                    data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                                    data-size="{{ $product->size }}" data-image="{{ $product->image_url }}"
                                                    data-toggle="modal" data-target="#modalProduct">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('pages.user.product.modal-cart')
@endsection

@push('after-js')
    <script>
        let price;
        const imagePublic = "{{ asset('image/product') }}"
        $(document).ready(function() {
            const products = document.querySelectorAll('.card-product');
            products.forEach(product => {
                const modalTrigger = product.querySelector('a');
                modalTrigger.addEventListener('click', function() {
                    const id = modalTrigger.getAttribute('data-id')
                    const name = modalTrigger.getAttribute('data-name')
                    const image = modalTrigger.getAttribute('data-image')
                    price = modalTrigger.getAttribute('data-price')
                    const size = modalTrigger.getAttribute('data-size')
                    $('#product_id').attr('value', id)
                    $('#name-cart').html(name)
                    $('#image-cart').attr('src', `${imagePublic}/${image}`)
                    $('#price-cart').html(`IDR ${price}`)
                    $('#size-cart').html(`Size ${size}`)
                    $('#total-cart').html(`IDR ${price}`)
                })
            });
        })

        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num");
        let a = 1;
        plus.addEventListener("click", () => {
            a++;
            // a = (a < 10) ? "0" + a : a;
            $('#qty').attr('value', a)
            $('#total-cart').html(`IDR ${price*a}`)
            num.innerText = a;
        });
        minus.addEventListener("click", () => {
            if (a > 1) {
                a--;
                // a = (a < 10) ? "0" + a : a;
                $('#qty').attr('value', a)
                $('#total-cart').html(`IDR ${price*a}`)
                num.innerText = a;
            }
        });
    </script>
@endpush

@push('after-css')
    <style>
        .wrapper span {
            width: 100%;
            text-align: center;
            font-size: 55px;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
        }

        .wrapper span.num {
            font-size: 50px;
            border-right: 2px solid rgba(0, 0, 0, 0.2);
            border-left: 2px solid rgba(0, 0, 0, 0.2);
            pointer-events: none;
        }
    </style>
@endpush
