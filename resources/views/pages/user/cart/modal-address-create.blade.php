<div class="modal fade" id="modalCreateAddr" tabindex="-1" role="dialog" aria-labelledby="modalCreateAddrLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.address.store') }}" method="POST" >
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipient">Nama Penerima</label>
                                <input type="text" class="form-control" id="recipient" name="recipient"
                                    value="{{ old('recipient') }}" placeholder="Nama Penerima">
                                @if ($errors->has('recipient'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('recipient') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number') }}" placeholder="Nomor Telepon">
                                @if ($errors->has('phone_number'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Label Alamat</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}" placeholder="Label alamat ini">
                                @if ($errors->has('title'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="detail">Alamat Detail</label>
                                <input type="text" class="form-control" id="detail" name="detail"
                                    value="{{ old('detail') }}" placeholder="Alamat Detail">
                                @if ($errors->has('detail'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('detail') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="district">Kecamatan</label>
                                <input type="text" class="form-control" id="district" name="district"
                                    value="{{ old('district') }}" placeholder="Kecamatan">
                                @if ($errors->has('district'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('district') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="city">Kota</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ old('city') }}" placeholder="Kota">
                                @if ($errors->has('city'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Kode Pos</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                    value="{{ old('postal_code') }}" placeholder="Kode Pos">
                                @if ($errors->has('postal_code'))
                                    <span
                                        class="text-danger invalid-feedback d-block">{{ $errors->first('postal_code') }}</span>
                                @endif
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-3">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
