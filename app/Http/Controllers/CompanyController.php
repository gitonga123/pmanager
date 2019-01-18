<?php

namespace pmanager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use pmanager\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = false;
        if (Auth::check()) {
            $company = Company::create([
                'name' => $request->input('name'),
                'description' => $request->input(['description']),
                'user_id' => Auth::user()->id,
            ]);
        }

        if($company) {
            return redirect()->route('companies.show', ['company' => $company->id])->with('success', 'Company Created Successfully');
        } else {
            return back()->withInput()->with('errors', ['The project could not be created, Contact your Admin']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
//        $company = Company::where('id', $company->id)->first();
        $company = Company::find($company->id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //save data
        $companyUpdate = Company::where('id', $company->id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
        if ($companyUpdate) {
            return redirect()->route('companies.show', ['company' => $company->id])
                ->with('success', 'Company Updated Successfully');
        }
        // redirect
        return back()->withInput()->with('errors', ['Company could not be updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
         $findCompany = Company::find($company->id);

         if ($findCompany->delete()) {
             return redirect()->route('companies.index')->with('success', 'Company Deleted Successfully');
         }

         return back()->withInput()->with('error', ['Company could not be deleted']);
    }
}
