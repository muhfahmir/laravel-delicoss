@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Edit Expedition</h1>
        </div>

        @include('partials.user.flash_message')
        <div class="section-body">
            <form action="{{ route('admin.expedition.update', 
            ['expedition_id' => $expedition->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="price">Nama</label>
                                    <input type="text" class="form-control" id="price" name="name"
                                        value="{{ $expedition->name }}" placeholder="Nama Expedition">
                                    @if ($errors->has('name'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $expedition->price }}" placeholder="Harga Expedition">
                                    @if ($errors->has('price'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.expedition.index') }}">Back</a>
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
