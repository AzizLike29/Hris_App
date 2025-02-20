<div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form id="form-select-employee">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pilih</th>
                                    <th>NIP</th>
                                    <th>Employee Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuti_employee as $emp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <input class="form-check-input employee-checkbox" type="radio"
                                                name="selected_employee" value="{{ $emp->nip }}"
                                                data-name="{{ $emp->employee_name }}">
                                        </td>
                                        <td>{{ $emp->nip }}</td>
                                        <td>{{ $emp->employee_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ms-1" id="select-employee-btn">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>
