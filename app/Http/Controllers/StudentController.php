<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'inputs.*.name' => 'required',
            'inputs.*.email' => 'required',
            'inputs.*.mark' => 'required',
        ],
        [
            'inputs.*.name.required' => 'The Name field is required!',
            'inputs.*.email.required' => 'The Email field is required!',
            'inputs.*.mark.required' => 'The Mark field is required!',
        ]);

        foreach ($request->inputs as $key => $value) {

            // dd($value);
            Student::create($value);
        }

        return back()->with('success', 'Student has been created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studend  $studend
     * @return \Illuminate\Http\Response
     */
    public function show(Studend $studend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studend  $studend
     * @return \Illuminate\Http\Response
     */
    public function edit(Studend $studend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studend  $studend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studend $studend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studend  $studend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studend $studend)
    {
        //
    }
}
