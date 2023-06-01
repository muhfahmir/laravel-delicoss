@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Edit Payment Type</h1>
        </div>

        @include('partials.user.flash_message')
        <div class="section-body">
            <form action="{{ route('admin.payment_type.update', 
            ['payment_type_id' => $paymentType->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $paymentType->name }}" placeholder="Nama Payment Type">
                                    @if ($errors->has('name'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="account">Account</label>
                                    <input type="text" class="form-control" id="account" name="account"
                                        value="{{ $paymentType->account }}" placeholder="No Account">
                                    @if ($errors->has('account'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('account') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.payment_type.index') }}">Back</a>
                                    <button type="submit" class="btn btn-primary mx-3">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
