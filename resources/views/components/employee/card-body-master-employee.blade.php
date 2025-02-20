<div class="card-body">
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>NIP</th>
                <th>Employee Name</th>
                <th>Gender</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $emp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('master-employee.edit', $emp->id) }}" class="btn icon btn-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('delete-master-employee', $emp->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn icon btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td class="nip">{{ $emp->nip }}</td>
                    <td class="name">{{ $emp->employee_name }}</td>
                    <td>{{ $emp->gender }}</td>
                    <td>{{ $emp->phone_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
