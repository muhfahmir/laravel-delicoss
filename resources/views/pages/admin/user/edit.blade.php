@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Edit User</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.user.update', ['user_id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        value="{{ $user->fullname }}" placeholder="Nama Lengkap">
                                    @if ($errors->has('fullname'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('fullname') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="user_role_id">Jenis Akun</label>
                                    <select class="form-control" id="user_role_id" name="user_role_id">
                                        <option value=""></option>
                                        @foreach ($userRoles as $userRole)
                                            <option value="{{ $userRole->id }}"
                                                {{ $userRole->id == $user->user_role_id ? 'selected' : '' }}>
                                                {{ $userRole->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="Nomor telepon Anda">
                                    @if ($errors->has('email'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}" placeholder="Password Anda">
                                    @if ($errors->has('password'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ $user->phone_number }}" placeholder="Nomor telepon Anda">
                                    @if ($errors->has('phone_number'))
                                        <span
                                            class="text-danger invalid-feedback d-block">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">Back</a>
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

@push('after-js')
    <script>
        $(document).ready(function() {
            $('#user_role_id').select2({
                placeholder: "Pilih Jenis Akun"
            });
        })
    </script>
@endpush
