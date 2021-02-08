<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees =employees::all();

        return view ('employees.indexEmployees',compact('employees')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.createEmployees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                'FirstName' => 'required',
                'LastName' => 'required',
                'Company' => 'required',
                'Email' => 'required',
                'Phone' => 'required',

            ]
        );

        employees::create($request->all());

        return redirect()->route('employees.indexEmployees')->paginate(10)
            ->with('success','Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
        return view('employees.showEmployees',compact('employees')->paginate(10));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(employees $employees)
    {
        //
        return view('employees.editEmployees',compact('employees'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employees $employees)
    {
        //
        $request->validate([
                'FirstName' => 'required',
                'LastName' => 'required',
                'Company' => 'required',
                'Email' => 'required',
                'Phone' => 'required',

            ]
        );

        employees::create($request->all());

        return redirect()->route('employees.indexEmployees')->paginate(10)
            ->with('success','Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employees)
    {
        //
        $employees->delete();

        return redirect()->route('employees.indexEmployees') ->with('success','Employee deleted successfully');
    }
}
