@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Add Product Categories</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.product_category.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Nama Product Category">
                                    @if ($errors->has('name'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.product_category.index') }}">Back</a>
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
