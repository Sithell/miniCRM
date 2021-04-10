<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('employee.index', [
            'employees' => Employee::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('employee.create', [
           'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees',
            'company_id' => 'required'
        ]);

        $id = Employee::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company_id' => $request->input('companyId'),
        ])->id;

        return redirect()->route('employee.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $company = Company::find($employee->company_id);

        return view('employee.show', [
            'id' => $employee->id,
            'firstName' => $employee->first_name,
            'lastName' => $employee->last_name,
            'email' => $employee->email,
            'phone' => $employee->phone,
            'companyId' => $employee->company_id,
            'companyName' => $company->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view('employee.edit', [
            'id' => $id,
            'companies' => Company::all(),
            'employee' => Employee::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'max:255',
            'lastName' => 'max:255',
        ]);

        Employee::find($id)->update([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company_id' => $request->input('companyId'),
        ]);
        return redirect(route('employee.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->back();
    }
}
