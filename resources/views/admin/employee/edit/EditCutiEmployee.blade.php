@extends('layout.app')

@section('content')
    <div class="page-heading">
        <h3>Edit Cuti Employee</h3>
    </div>

    <form action="{{ route('cuti_employee.update', $cuti->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 d-flex align-items-center">
            <label for="karyawan" class="me-3" style="min-width: 100px;">Karyawan</label>
            <div class="input-group">
                <input type="text" id="karyawan" class="form-control" value="{{ $cuti->karyawan }}"
                    placeholder="Pilih Karyawan" readonly>
                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                    data-bs-target="#border-less">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="tanggal_cuti">Tanggal Cuti</label>
            <input type="date" class="form-control" id="tanggal_cuti" name="tanggal_cuti"
                value="{{ $cuti->tanggal_cuti }}" required>
        </div>
        <div class="mb-3">
            <label for="lama_cuti">Lama Cuti (Hari)</label>
            <input type="number" class="form-control" id="lama_cuti" name="lama_cuti" value="{{ $cuti->lama_cuti }}"
                min="1" required>
        </div>
        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $cuti->keterangan }}"
                required>
        </div>
        <div class="d-flex justify-content-end my-3">
            <a href="{{ route('cuti_employee.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection

{{-- popup karyawan --}}
@include('components.cuti.popup-karyawan-edit')
