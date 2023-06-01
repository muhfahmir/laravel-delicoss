@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Edit User Role</h1>
        </div>

        @include('partials.user.flash_message')
        <div class="section-body">
            <form action="{{ route('admin.user_role.update', 
            ['user_role_id' => $userRole->id]) }}"
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
                                        value="{{ $userRole->name }}" placeholder="Nama User Role">
                                    @if ($errors->has('name'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary"
                                        href="{{ route('admin.user_role.index') }}">Back</a>
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
