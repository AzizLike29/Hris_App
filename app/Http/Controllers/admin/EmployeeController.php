<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = master_employee::all();
        return view('admin.employee.MasterEmployee', compact('employee'), ['title' => 'Master Employee']);
    }

    public function create()
    {
        $lastNip = master_employee::max('nip');
        $nextNip = $lastNip ? 'EMP' . str_pad((intval(substr($lastNip, 3)) + 1), 5, '0', STR_PAD_LEFT) : 'EMP00001';

        return view('admin.employee.add.AddMasterEmployee', [
            'nextNipEmployee' => $nextNip,
            'title' => 'Add Master Employee'
        ]);
    }

    public function add_master(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|max:255',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|max:13',
            'address' => 'required',
            'date_of_birth' => 'required|date',
        ]);

        $nip = master_employee::max('nip');
        $newNip = $nip ? 'EMP' . str_pad((intval(substr($nip, 3)) + 1), 5, '0', STR_PAD_LEFT) : 'EMP00001';

        master_employee::create($request->all() + ['nip' => $newNip]);

        return redirect()->route('master-employee')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = master_employee::findOrFail($id);
        return view('admin.employee.edit.EditMasterEmployee', compact('employee'), ['title' => 'Edit Master Employee']);
    }

    public function update_master(Request $request, $id)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'gender' => 'required|in:Male, Female',
            'phone_number' => 'required|string|max:13',
            'address' => 'required:string',
            'date_of_birth' => 'required|date',
        ]);

        $employee = master_employee::findOrFail($id);
        // kecuali NIP
        $employee->update($request->except('nip'));

        return redirect()->route('master-employee')->with('success', 'Employee updated successfully.');
    }

    public function delete_master($id)
    {
        $employee = master_employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('master-employee')->with('success', 'Employee deleted successfully.');
    }
}
