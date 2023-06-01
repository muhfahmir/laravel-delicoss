<div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="modalProductLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="product_id" value="" id="product_id">
                    <input type="hidden" name="qty" value="1" id="qty">
                    <div class="card">
                        <img class="card-img-top" src="" alt="Card image cap" height="250" id="image-cart">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title " id="name-cart">{{ $product->name }}</h5>
                                </div>
                                <div class="col-6">
                                    <p class="card-text" id="price-cart">IDR {{ $product->price }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-text" id="size-cart"> {{ $product->size }}</p>
                                </div>
                                <div class="col-6">
                                    <p>Jumlah Produk</p>
                                    <div class="wrapper">
                                        <span class="minus">-</span>
                                        <span class="num">1</span>
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text" id="desc-cart"> Deskripsi</p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Subtotal</p>
                                    <p id="total-cart">IDR </p>
                                </div>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
</div>
