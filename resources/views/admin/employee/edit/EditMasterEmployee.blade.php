@extends('layout.app')

@section('content')
    <div class="page-heading">
        <h3>Edit Employee</h3>
    </div>

    <form action="{{ route('master-employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ $employee->nip }}" required
                readonly>
        </div>
        <div class="mb-3">
            <label for="employee_name">Employee Name</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name"
                value="{{ $employee->employee_name }}" required>
        </div>
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select name="gender" class="form-select" required>
                <option value="" disabled>--Select Gender--</option>
                <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="number" class="form-control" id="phone_number" name="phone_number"
                value="{{ $employee->phone_number }}" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}"
                required>
        </div>
        <div class="mb-3">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                value="{{ $employee->date_of_birth }}" required>
        </div>
        <div class="d-flex justify-content-end my-3">
            <a href="{{ route('master-employee') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
