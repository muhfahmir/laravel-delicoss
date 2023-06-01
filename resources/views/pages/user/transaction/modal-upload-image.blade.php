<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUploadLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.transaction.uploadImage') }}" method="POST"enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group" style="height: 200px; width: 200px;">
                                <label for="image_url" class="frame" id="frameImage"
                                    style="width: 100%;height:100%;cursor: pointer">
                                    <img src="{{ asset('image/default-image.jpg') }}" width="100%" height="100%"
                                        style="border-radius: 5px;">
                                </label>
                                <input type="file" id="image_url" name="image_url" style="opacity: 0;">
                            </div>
                            {{-- <div class="card-footer"> --}}
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
