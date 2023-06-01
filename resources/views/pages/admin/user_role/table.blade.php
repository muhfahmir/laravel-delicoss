<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userRoles as $userRole)
            <tr>
                <th scope="row">{{ $userRole->id }}</th>
                <td>{{ $userRole->name }}</td>
                <td class="">
                    <a href="{{ route('admin.user_role.edit', ['user_role_id' => $userRole->id]) }}"
                        class="btn btn-warning mr-3">Edit</a>
                    <a href="{{ route('admin.user_role.destroy', ['user_role_id' => $userRole->id]) }}"
                        onclick="return confirm('Are you sure?')" class="btn btn-danger mr-3">Hapus</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
