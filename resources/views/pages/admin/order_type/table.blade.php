<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderTypes as $order_type)
            <tr>
                <th scope="row">{{ $order_type->id }}</th>
                <td>{{ $order_type->name }}</td>
                <td>{{ $order_type->price }}</td>
                <td class="">
                    <a href="{{ route('admin.order_type.edit', ['order_type_id' => $order_type->id]) }}"
                        class="btn btn-warning mr-3">Edit</a>
                    <a href="{{ route('admin.order_type.destroy', ['order_type_id' => $order_type->id]) }}"
                        onclick="return confirm('Are you sure?')" class="btn btn-danger mr-3">Hapus</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
