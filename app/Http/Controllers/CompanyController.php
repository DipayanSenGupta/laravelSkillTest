<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $companies = ::all();
        $companies = Company::paginate(10);
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        // $company = Company::create(
        //     $request->input()
        // );
        $company = new Company;
        dd($request);
        $company->name = $request->name;
        $company->email = $request->emaiil;
        $company->website = $request->website;

        if($request->hasfile('filename')){
            foreach ($request->file('filename') as $image) {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/',$name);
                $data[] = $name;
            }
        }
        $company->filename=json_encode($data);
        $company->save();
        flash('Company created!')->success();
        return redirect()->route('company.show',['company' => $company]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyStoreRequest $request, Company $company)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->emaiil;
        $company->website = $request->website;
        $company->save();
        // return redirect()
        // ->route('company.show', $company)
        // ->with('message', 'Company updated!');
        flash('Company edited!')->success();
        return redirect()->route('company.show',['company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()
            ->route('company.index')
            ->with('message','Company has been deleted');
    }
}
