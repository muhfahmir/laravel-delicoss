<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Kategori</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->productCategory->name }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->price }}</td>
                <td class="">
                    <a href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}"
                        class="btn btn-warning mr-3">Edit</a>
                    <a href="{{ route('admin.product.destroy', ['product_id' => $product->id]) }}"
                        onclick="return confirm('Are you sure?')" class="btn btn-danger mr-3">Hapus</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
