<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Account</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paymentTypes as $payment_type)
            <tr>
                <th scope="row">{{ $payment_type->id }}</th>
                <td>{{ $payment_type->name }}</td>
                <td>{{ $payment_type->account }}</td>
                <td class="">
                    <a href="{{ route('admin.payment_type.edit', ['payment_type_id' => $payment_type->id]) }}"
                        class="btn btn-warning mr-3">Edit</a>
                    <a href="{{ route('admin.payment_type.destroy', ['payment_type_id' => $payment_type->id]) }}"
                        onclick="return confirm('Are you sure?')" class="btn btn-danger mr-3">Hapus</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
