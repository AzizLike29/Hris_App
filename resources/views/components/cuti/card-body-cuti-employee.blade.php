<div class="card-body">
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>NIP</th>
                <th>Employee Name</th>
                <th>Leave Date</th>
                <th>Leave Duration</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuti_employee as $ct_emp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('cuti-employee.edit', $ct_emp->id) }}" class="btn icon btn-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('cuti_employee.delete', $ct_emp->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn icon btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td class="nip">{{ $ct_emp->nip }}</td>
                    <td class="karyawan">{{ $ct_emp->karyawan }}</td>
                    <td class="tanggal_cuti">{{ $ct_emp->tanggal_cuti }}</td>
                    <td>{{ $ct_emp->lama_cuti }}</td>
                    <td>{{ $ct_emp->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
