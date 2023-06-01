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
                                                {{-- <div class="d-flex justify-content-between">
                                                    <a href="#" data-qty="{{ $cart->qty }}"
                                                        data-id="{{ $cart->id }}" data-name="{{ $cart->product->name }}"
                                                        data-price="{{ $cart->product->price }}"
                                                        data-size="{{ $cart->product->size }}"
                                                        data-image="{{ $cart->product->image_url }}" data-toggle="modal"
                                                        data-target="#modalEditCart" class="edit-cart">Edit</a>
                                                    <a href="{{ route('user.cart.destroy', ['cart_id' => $cart->id]) }}"
                                                        onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger mr-3">Remove</a>
                                                </div> --}}
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
                    <form action="{{ route('user.transaction.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total_payment" value="{{ $total_payment }}">
                        <input type="hidden" name="order_type_id" value="{{ $request->order_type_id }}">
                        <input type="hidden" name="address_id" value="{{ $request->address_id }}">
                        <input type="hidden" name="delivery_date" value="{{ $request->delivery_date }}">
                        <input type="hidden" name="delivery_time" value="{{ $request->delivery_time }}">
                        <input type="hidden" name="note" value="{{ $request->note }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Summary Order</h5>
                                <div class="d-flex justify-content-between">
                                    <h6>Place Order</h6>
                                    <p>{{ $orderType->name }}</p>
                                </div>
                                <p>Pick Up From</p>
                                <p class="mb-3">Delicoss Store Address</p>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>PICKUP DATE</p>
                                        <p>{{ $request->delivery_date }}</p>
                                    </div>

                                    <div>
                                        <p>PICKUP TIME</p>
                                        <p>{{ $request->delivery_time }}</p>
                                    </div>
                                </div>
                                
                                {{-- select type order admin need to create first --}}
                                <div class="form-group">
                                    <label for="payment_type_id">Choose Payment</label>
                                    <select class="form-control" id="payment_type_id" name="payment_type_id">
                                        <option value=""></option>
                                        @foreach ($paymentTypes as $paymentType)
                                            <option value="{{ $paymentType->id }}">{{ $paymentType->name }} |
                                                {{ $paymentType->account }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- select address to send user need to create first --}}
                                {{-- select date delivery --}}
                                
                                <hr>
                                <div class="d-flex justify-content-between">
                                <p>Creation ( {{ $total_qty }} )</p>
                                <p>IDR
                                    <Span class="font-weight-bold">
                                        {{ $total_payment }}
                                    </Span>
                                </p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                   <h6>Total</h6>
                                    <p>IDR
                                        <Span class="font-weight-bold">
                                            {{ $total_payment }}
                                        </Span>
                                    </p>
                                </div> 
                                @if (!$carts->isEmpty())
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Buat Pesanan
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
@endsection
