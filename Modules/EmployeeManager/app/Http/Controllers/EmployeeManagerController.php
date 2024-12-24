<?php

namespace Modules\EmployeeManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EmployeeManager\Models\Employee;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Modules\EmployeeManager\Http\Requests\StoreEmployeeRequest;

class EmployeeManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        // Display the employee view with DataTable
    public function index()
    {
        $data = Employee::orderBy('created_at','desc')->paginate(10);
        return view('employeemanager::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employeemanager::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            Employee::create($request->validated());
            return redirect()->route('employee.index')->with('success', 'Employee created successfully!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error' , 'something went wrong');
        }
    }

    /**
     * Show the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employeemanager::create', compact('employee'));
    }

    // Update the specified employee in storage
    public function update(Request $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            // Validate the data
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:employees,email,' . $employee->id,
                'dob' => 'required|date',
                'doj' => 'required|date',
            ]);
    
            // Update employee
            $employee->update($request->all());
    
            return redirect()->route('employee.index')->with('success', 'Employee updated successfully!');
       
        } catch (\Throwable $th) {
            return redirect()->back()->with('error' , 'something went wrong');
        }
     }

    // Remove the specified employee from storage
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
    
            // Delete employee
            $employee->delete();
    
            return redirect()->route('employee.index')->with('success', 'Employee deleted successfully!');
     

        } catch (\Throwable $th) {
            return redirect()->route('employee.index')->with('error', 'Employee deleted successfully!');

        }
    }
}
