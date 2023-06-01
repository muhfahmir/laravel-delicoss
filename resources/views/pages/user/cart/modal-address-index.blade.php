<div class="modal fade" id="modalIndexAddr" tabindex="-1" role="dialog" aria-labelledby="modalIndexAddrLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (!$addresses->isEmpty())
                    @foreach ($addresses as $index => $address)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="address_id" id="address_id"
                                value="{{ $address->id }}">
                            <label class="form-check-label" for="address_id">
                                {{ $address->title }}|{{ $address->city }}
                            </label>
                        </div>
                    @endforeach
                @endif


                <a href="#" data-toggle="modal" data-target="#modalCreateAddr" class="btn btn-success">
                    create new address
                </a>
                <button class="btn btn-primary btn-block btn-lg mt-3" id="save-sent-to">Save</button>

            </div>
        </div>
    </div>
</div>
