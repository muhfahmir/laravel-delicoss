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
        @foreach ($expeditions as $expedition)
            <tr>
                <th scope="row">{{ $expedition->id }}</th>
                <td>{{ $expedition->name }}</td>
                <td>{{ $expedition->price }}</td>
                <td class="">
                    <a href="{{ route('admin.expedition.edit', ['expedition_id' => $expedition->id]) }}"
                        class="btn btn-warning mr-3">Edit</a>
                    <a href="{{ route('admin.expedition.destroy', ['expedition_id' => $expedition->id]) }}"
                        onclick="return confirm('Are you sure?')" class="btn btn-danger mr-3">Hapus</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
