@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-center" style="margin-top:-5px">
            <div>
                <p>{{ $user->fullname }}</p>
                <p>Order History</p>
            </div>
        </div>

        <div class="row">
            @foreach ($transactions as $transaction)
                <div class="col-10">
                    <div class="card card-ts">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <p>{{ $transaction->created_at }}</p>
                                    <p>{{ $transaction->id }}</p>
                                    <p>{{ $transaction->cart->product->price * $transaction->cart->qty }}</p>
                                    {{-- <p>{{$transactions[0]->}}</p> --}}
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('image/product') . '/' . $transaction->cart->product->image_url }}"
                                        alt="product image" height="100" width="100">
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6>{{ $transaction->cart->product->name }}</h6>
                                        </div>
                                        <div>
                                            <h6>
                                                @if ($transaction->status_payment == 'P')
                                                    Pending
                                                @elseif ($transaction->status_payment == 'C')
                                                    Cancel
                                                @else
                                                    Success
                                                @endif
                                            </h6>
                                            <p>{{ $transaction->address->detail }} {{ $transaction->address->district }},
                                                {{ $transaction->address->city }}, {{ $transaction->address->postal_code }}
                                            </p>
                                            @if ($transaction->status_payment == 'P')
                                                <a href="#" data-toggle="modal" data-target="#modalUpload"
                                                    data-id="{{ $transaction->id }}" class="edit-ts">Update Transaksi</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-2">

                </div>
            @endforeach

        </div>
    </section>
    @include('pages.user.transaction.modal-upload-image')
@endsection


@push('after-js')
    <script>
        $(document).ready(function() {
            const products = document.querySelectorAll('.card-ts');
            products.forEach(product => {
                const modalTrigger = product.querySelector('.edit-ts');
                modalTrigger.addEventListener('click', function() {
                    const id = modalTrigger.getAttribute('data-id')
                    $('#id').attr('value', id)
                })
            });

            // select2
            $('#order_type_id').select2({
                placeholder: "Pilih Order Type"
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
