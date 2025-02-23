@extends('layout.app')

@section('content')
    <div class="page-heading">
        <h3>Create Employee</h3>
    </div>

    <form action="{{ route('master-employee.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="mb-3">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $nextNipEmployee }}" required
                readonly>
        </div>
        <div class="mb-3">
            <label for="employee_name">Employee Name</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name"
                placeholder="Enter Employee Name" required>
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" class="form-select" required>
                <option value="" selected disabled>--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="number" class="form-control" id="phone_number" name="phone_number"
                placeholder="Enter Phone Number" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
        </div>
        <div class="mb-3">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="date" class="form-control" id="nip" placeholder="Enter Date Of Birth" name="date_of_birth"
                required>
        </div>
        <div class="d-flex justify-content-end my-3">
            <a href="{{ route('master-employee') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
