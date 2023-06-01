@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Payment Types</h1>
            <a href="{{ route('admin.payment_type.create') }}" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i> Payment Type</a>
        </div>

        <div class="section-body">
            @include('partials.user.flash_message')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @include('pages.admin.payment_type.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
