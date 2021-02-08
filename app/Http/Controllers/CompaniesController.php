<?php

namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies =companies::all();

        return view ('companies.indexCompanies',compact('companies')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.createCompanies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:100',
            'Website' => 'required',
            ]
        );
        if($files = $request->file('Logo')){
            $destinationPath = public_path('/storage/app/public');
            $logoImage = date('YmdHis').".".$files->getClientOriginalExtension();
            $files->move($destinationPath,$logoImage);
            $insert['image'] ="$logoImage";

            $imageModel = new Photo();
            $imageModel->photo_name = "$logoImage";
            $imageModel->save();
        }
        companies::create($request->all());

        return redirect()->route('companies.indexCompanies')->paginate(10)
                                ->with('success','Company created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
        return view('companies.showCompanies',compact('companies')->paginate(10));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies)
    {
        //
        return view('companies.editCompanies',compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies)
    {
        //
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:100',
            'Website' => 'required',
        ]);
        if($files = $request->file('Logo')){
            $destinationPath = public_path('/storage/app/public');
            $logoImage = date('YmdHis').".".$files->getClientOriginalExtension();
            $files->move($destinationPath,$logoImage);
            $insert['image'] ="$logoImage";

            $imageModel = new Photo();
            $imageModel->photo_name = "$logoImage";
            $imageModel->save();
        }

        $companies->update($request->all());

        return redirect()->route('companies.indexCompanies')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies)
    {
        //
        $companies->delete();

        return redirect()->route('companies.indexCompanies') ->with('success','Company deleted successfully');
    }
}
