@extends('layout.app')

@section('content')
    @include('layout.partials.messages')
    <div class="page-heading">
        <h3>Master Employee</h3>
    </div>

    <div class="card">
        <div class="card-body px-4 py-4-5">
            <div class="row">
                <section class="section">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <label for="searchName" class="mb-0 me-2">NIP:</label>
                                <input type="text" id="searchNIP" class="form-control" placeholder="Pencarian NIP">
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <label for="searchName" class="mb-0 me-2 text-nowrap">Employee
                                    Name:</label>
                                <input type="text" id="searchName" class="form-control" placeholder="Pencarian Nama">
                            </div>
                        </div>
                        @include('components.employee.card-body-master-employee')
                        <div class="d-flex justify-content-end mt-2">
                            @include('components.employee.button-add-new')
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
            const searchName = document.getElementById("searchName");
            const tableRows = document.querySelectorAll("#table1 tbody tr");

            function filterTable() {
                const nipValue = searchNIP.value.toLowerCase();
                const nameValue = searchName.value.toLowerCase();

                tableRows.forEach(row => {
                    const nipText = row.querySelector(".nip").textContent.toLowerCase();
                    const nameText = row.querySelector(".name").textContent.toLowerCase();

                    if (nipText.includes(nipValue) && nameText.includes(nameValue)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            searchNIP.addEventListener("input", filterTable);
            searchName.addEventListener("input", filterTable);
        });
    </script>
@endsection
