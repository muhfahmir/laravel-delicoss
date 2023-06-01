<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->isEmpty())
            <p>Data kosong</p>
        @else
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td class="">
                        <a href="{{ route('admin.user.edit', ['user_id' => $user->id]) }}"
                            class="btn btn-warning mr-3">Edit</a>
                        <a href="{{ route('admin.user.destroy', ['user_id' => $user->id]) }}"
                            onclick="return confirm('Are you sure?')" class="btn btn-danger mr-3">Hapus</a>
                    </td>
                </tr>
            @endforeach

        @endif

    </tbody>
</table>
