<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('company.index', [
            'companies' => Company::paginate(15)
        ]);
    }

    /**
     * Display a list of user's companies
     *
     */
    public function showMy()
    {
        return view('company.index', [
            'companies' => Company::where('owner_id', Auth::id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $fileName = uniqid().'.'.$request->file->extension();
        $request->file->move(storage_path('app/public/companies'), $fileName);
        $id = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'logo' => 'storage/companies/'.$fileName,
            'owner_id' => $request->user()->id,
        ])->id;

        return redirect()->route('company.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $company = Company::find($id);
        if ($company === null) {
            throw new NotFoundHttpException("Company with such id doesn't exist");
        }
        $owner = User::find($company->owner_id);
        return view('company.show', [
            'id' => $id,
            'name' => $company->name,
            'img' => asset($company->logo),
            'email' => $company->email,
            'phone' => $company->phone,
            'website' => $company->website,
            'owner' => $owner->name,
            'employees' => Employee::where('company_id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view('company.edit', [
            'id' => $id,
            'company' => Company::find($id)
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
        if ($request->hasFile('file')) {
            unlink(Company::find($id)->logo);
            $fileName = uniqid().'.'.$request->file('file')->extension();
            $request->file('file')->move(storage_path('app/public/companies'), $fileName);
            Company::find($id)->update([
                'id' => $id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'website' => $request->input('website'),
                'logo' => 'storage/companies/'.$fileName,
            ]);
        }
        else {
            Company::find($id)->update([
                'id' => $id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'website' => $request->input('website'),
            ]);
        }

        return redirect(route('company.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $employees = Employee::whereCompanyId($id)->get();
        foreach ($employees as $employee) {
            $employee->delete();
        }
        Company::find($id)->delete();
        return redirect()->back();
    }
}
