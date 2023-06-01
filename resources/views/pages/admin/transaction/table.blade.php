<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name Order</th>
            <th scope="col">Price</th>
            <th scope="col">Proof Payment</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <th scope="row">{{ $transaction->id }}</th>
                <td>{{ $transaction->user->fullname }}</td>
                <td>{{ $transaction->cart->product->price }}</td>
                <td>
                    @if ($transaction->proof_payment != null)
                        <img src="{{ asset('image/transaction') . '/' . $transaction->proof_payment }}" alt="proof"
                            height="100">
                    @else
                        Belum bayar
                    @endif

                </td>
                <td class="d-flex">
                    @if ($transaction->status_payment != 'S')
                        {{-- <form action="{{ route('user.transaction.update', ['transaction_id' => $transaction->id]) }}"
                            method="POST" class="mr-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="S" name="status_payment">
                            <button type="submit" class="btn btn-success mr-3">Confirm</button>
                        </form> --}}
                        <a class="btn btn-success mr-3" href="{{route('admin.transaction.updateStatus',[
                            'transaction_id'=>$transaction->id,
                            'status_payment'=>'S'
                        ])}}">Confirm</a>
                    @endif
                    <a class="btn btn-danger " href="{{route('admin.transaction.updateStatus',[
                        'transaction_id'=>$transaction->id,
                        'status_payment'=>'C'
                    ])}}">Reject</a>

                    {{-- <form action="{{ route('user.transaction.update', ['transaction_id' => $transaction->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="C" name="status_payment">
                        <button type="submit" class="btn btn-danger mr-3">Reject</button>
                    </form> --}}

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
