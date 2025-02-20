@extends('layout.app')

@section('content')
    @include('layout.partials.messages')

    <div class="page-heading">
        <h3>Cuti Employee</h3>
    </div>

    <div class="card">
        <div class="card-body px-4 py-4-5">
            <div class="row">
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column">
                                <label for="searchNip" class="mb-1">NIP:</label>
                                <input type="text" id="searchNIP" class="form-control mb-2" placeholder="Pencarian NIP">

                                <label for="searchNameKaryawan" class="mb-1">Employee Name:</label>
                                <input type="text" id="searchNameKaryawan" class="form-control"
                                    placeholder="Pencarian Nama Karyawan">
                            </div>

                            <div class="d-flex align-items-center flex-nowrap">
                                <label for="searchTanggalCuti" class="mb-0 me-2 text-nowrap">Tanggal Cuti:</label>
                                <input type="date" id="searchTanggalCuti" class="form-control"
                                    placeholder="Pencarian Tanggal Cuti">
                            </div>
                        </div>
                        @include('components.cuti.card-body-cuti-employee')
                        <div class="d-flex justify-content-end mt-2">
                            @include('components.cuti.button-add-new')
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchNIP = document.getElementById("searchNIP");
            const searchNameKaryawan = document.getElementById("searchNameKaryawan");
            const searchTanggalCuti = document.getElementById("searchTanggalCuti");
            const tableRows = document.querySelectorAll("#table1 tbody tr");

            function filterTable() {
                const nipValue = searchNIP.value.toLowerCase();
                const nameKaryawanValue = searchNameKaryawan.value.toLowerCase();
                const tanggalCutiValue = searchTanggalCuti.value.toLowerCase();

                tableRows.forEach(row => {
                    const nipText = row.querySelector(".nip").textContent.toLowerCase();
                    const karyawanText = row.querySelector(".karyawan").textContent.toLowerCase();
                    const tanggalCutiText = row.querySelector(".tanggal_cuti").textContent.toLowerCase();

                    if (nipText.includes(nipValue) && karyawanText.includes(nameKaryawanValue) &&
                        tanggalCutiText
                        .includes(
                            tanggalCutiValue)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            searchNIP.addEventListener("input", filterTable);
            searchNameKaryawan.addEventListener("input", filterTable);
            searchTanggalCuti.addEventListener("input", filterTable);
        });
    </script>
@endsection
