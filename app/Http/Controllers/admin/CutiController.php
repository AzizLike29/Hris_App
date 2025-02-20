<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\cuti_employee;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CutiController extends Controller
{
    public function index()
    {
        $cuti_employee = cuti_employee::all();
        return view('admin.employee.CutiEmployee', compact('cuti_employee'), ['title' => 'Cuti Employee']);
    }

    public function create()
    {
        $cuti_employee = DB::table('master_employee')
            ->select('nip', 'employee_name')
            ->get();

        return view('admin.employee.add.AddCutiEmployee', [
            'title' => 'Create Cuti Employee',
            'cuti_employee' => $cuti_employee
        ]);
    }

    public function select_cuti_employee(Request $request)
    {
        $selectedNips = $request->input('employee_selection', []);

        $selectedEmployees = DB::table('master_employee')
            ->whereIn('nip', $selectedNips)
            ->select('nip', 'employee_name')
            ->get();

        session([
            'selected_employees' => $selectedEmployees,
            'selected_employees_display' => $selectedEmployees->pluck('employee_name')->join(', ')
        ]);

        session()->save();
        // dd(session()->all());

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $selectedEmployees = session('selected_employees', []);

        if (empty($selectedEmployees)) {
            return redirect()->back()->with('error', 'Select the employee first');
        }

        $tanggal_cuti = Carbon::parse($request->tanggal_cuti);
        $lama_cuti = $request->lama_cuti;

        foreach ($selectedEmployees as $employee) {
            for ($i = 0; $i < $lama_cuti; $i++) {
                $current_date = $tanggal_cuti->copy()->addDays($i);

                cuti_employee::create([
                    'karyawan' => $employee->nip,
                    'tanggal_cuti' => $current_date->format('Y-m-d'),
                    'lama_cuti' => $lama_cuti,
                    'keterangan' => $request->keterangan
                ]);
            }
        }

        session()->forget(['selected_employees', 'selected_employees_display']);
        return redirect()->route('cuti_employee.index')->with('success', 'Leave data added successfully');
    }

    public function edit($id)
    {
        $cuti = cuti_employee::findOrFail($id);
        $cuti_employee = DB::table('master_employee')->select('nip', 'employee_name')->get();

        return view('admin.employee.edit.EditCutiEmployee', compact('cuti', 'cuti_employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_cuti' => 'required|date',
            'lama_cuti' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        $cuti_employee = cuti_employee::findOrFail($id);

        $cuti_employee->update([
            'tanggal_cuti' => $request->tanggal_cuti,
            'lama_cuti' => $request->lama_cuti,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('cuti_employee.index')->with('success', 'Data cuti berhasil diperbarui.');
    }


    public function delete_cuti_employee($id)
    {
        $cuti_employee = cuti_employee::findOrFail($id);
        $cuti_employee->delete();

        return redirect()->route('cuti_employee.index')->with('success', 'Employee deleted successfully.');
    }
}
