@extends('layouts.app')

@section('content')
    <?php
    $total_payment = 0;
    $total_qty = 0;
    ?>
    <section class="section">
        <div class="section-header justify-content-center" style="margin-top:-5px">
        </div>

        <div class="section-body">
            @include('partials.user.flash_message')
            <div class="row">
                <div class="col-8">
                    <div class="d-flex justify-content-between">
                        <h5>Shopping Cart</h5>
                        <h5>Jumlah Produk</h5>
                    </div>
                    @if ($carts->isEmpty())
                    <p>Data kosong</p>
                @else
                    @foreach ($carts as $cart)
                        <?php
                        $total_payment = $total_payment + $cart->qty * $cart->product->price;
                        $total_qty = $total_qty + $cart->qty;
                        ?>
                        {{-- item --}}
                        <hr />
                        <div class="card card-product">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('image/product') . '/' . $cart->product->image_url }}"
                                        alt="image product" height="100">
                                </div>
                                <div class="col-9">
                                    <h4>{{ $cart->product->name }}</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Size</p>
                                            <span class="d-block">{{ $cart->product->size }}</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Qty</p>
                                                    <span class="d-block">{{ $cart->qty }}</span>
                                                </div>
                                                <div class="col-6">
                                                    <p>Price</p>
                                                    <span class="d-block">IDR {{ $cart->product->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex justify-content-between">
                                                <a href="#" data-qty="{{ $cart->qty }}"
                                                    data-id="{{ $cart->id }}" data-name="{{ $cart->product->name }}"
                                                    data-price="{{ $cart->product->price }}"
                                                    data-size="{{ $cart->product->size }}"
                                                    data-image="{{ $cart->product->image_url }}" data-toggle="modal"
                                                    data-target="#modalEditCart" class="edit-cart">Edit</a> 
                                                <a href="{{ route('user.cart.destroy', ['cart_id' => $cart->id]) }}"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger mr-3">Remove</a>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <p>Subtotal <span>IDR {{ $cart->product->price * $cart->qty }}</span> </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end item --}}
                    @endforeach
                    @endif

                </div>
                <div class="col-4">
                    <form action="{{route('user.transaction.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="total_payment" value="{{$total_payment}}">
                        <div class="card">
                            <div class="card-body">
                                {{-- select type order admin need to create first --}}
                                <div class="form-group">
                                    <label for="order_type_id">Order Type</label>
                                    <select class="form-control" id="order_type_id" name="order_type_id">
                                        <option value=""></option>
                                        @foreach ($orderTypes as $order_type)
                                            <option value="{{ $order_type->id }}">{{ $order_type->name }} |
                                                {{ $order_type->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- select address to send user need to create first --}}
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        
                                        <label for="address_id">Address</label>
                                        <button type="button" class="btn btn-warning"  data-toggle="modal"
                                        data-target="#modalCreateAddr" >Add</button>
                                    </div>
                                    <select class="form-control" id="address_id" name="address_id">
                                        <option value=""></option>
                                        @foreach ($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->title }} |
                                                {{ $address->detail }}
                                                {{ $address->district }},{{ $address->city }},{{ $address->postal_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- select date delivery --}}
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="delivery_date">
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="time" class="form-control" name="delivery_time">
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <input type="text" class="form-control" name="note">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p>Creation ( {{ $total_qty }} )</p>
                                    <p>IDR
                                        <Span class="font-weight-bold">
                                            {{ $total_payment }}
                                        </Span>
                                    </p>
                                </div>
                                @if (!$carts->isEmpty())
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Checkout
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>


        </div>
    </section>
    @if (!$carts->isEmpty())
    @include('pages.user.cart.modal-edit-cart')
    @include('pages.user.cart.modal-address-index')
    @include('pages.user.cart.modal-address-create')
@endif
    
@endsection

@push('after-js')
    <script>
        let price = 0;
        let qty = 0;
        const imagePublic = "{{ asset('image/product') }}"
        $(document).ready(function() {
            const products = document.querySelectorAll('.card-product');
            products.forEach(product => {
                const modalTrigger = product.querySelector('.edit-cart');
                modalTrigger.addEventListener('click', function() {
                    const id = modalTrigger.getAttribute('data-id')
                    const name = modalTrigger.getAttribute('data-name')
                    const image = modalTrigger.getAttribute('data-image')
                    price = modalTrigger.getAttribute('data-price')
                    const size = modalTrigger.getAttribute('data-size')
                    qty = modalTrigger.getAttribute('data-qty')
                    $('#cart_id').attr('value', id)
                    $('#name-cart').html(name)
                    $('#image-cart').attr('src', `${imagePublic}/${image}`)
                    $('#price-cart').html(`IDR ${price}`)
                    $('#size-cart').html(`Size ${size}`)
                    $('.num').html(qty)
                    $('#total-cart').html(`IDR ${price * qty }`)
                })
            });

            // select2
            $('#order_type_id').select2({
                placeholder: "Pilih Order Type"
            });
        })
        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num");
        // let a = Number(qty);
        plus.addEventListener("click", () => {
            qty++;
            // a = (a < 10) ? "0" + a : a;
            $('#qty').attr('value', qty)
            $('#total-cart').html(`IDR ${price*qty}`)
            num.innerText = qty;
        });
        minus.addEventListener("click", () => {
            if (qty > 1) {
                qty--;
                // a = (a < 10) ? "0" + a : a;
                $('#qty').attr('value', qty)
                $('#total-cart').html(`IDR ${price*qty}`)
                num.innerText = qty;
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
