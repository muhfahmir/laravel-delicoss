@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Add Expedition</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.expedition.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Nama Expedition">
                                    @if ($errors->has('name'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price">Harga Expedition</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ old('price') }}" placeholder="Harga Expedition">
                                    @if ($errors->has('price'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.expedition.index') }}">Back</a>
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
