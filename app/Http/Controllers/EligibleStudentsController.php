<?php

namespace App\Http\Controllers;

use App\Models\EligibleStudent;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Imports\StudentsImport;

class EligibleStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        return view('eligibleStudents.index',compact('eligibleStudents','studentRegistrations'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eligibleStudents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EligibleStudent::create($request->all());
        return redirect()->route('eligibleStudents.index')
            ->with('success','Student add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function show(EligibleStudent $eligibleStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(EligibleStudent $eligibleStudent)
    {
        return view('eligibleStudents.edit',compact('eligibleStudent'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EligibleStudent $eligibleStudent)
    {
        $eligibleStudent->update([
            'nameWithInitials'=>$request->input('nameWithInitials'),
            'regNum'=>$request->input('regNum'),
            'indexNum'=>$request->input('indexNum'),
            'faculty'=>$request->input('faculty'),
            'department'=>$request->input('department'),
        ]);

        return redirect()->route('eligibleStudents.index')
            ->with('success','Product updated successfully');

    }

    public function updateStatus(Request $request, EligibleStudent $eligibleStudent)
    {
        $eligibleStudent->update([
            'faculty'=>'123',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(EligibleStudent $eligibleStudent)
    {
        //
        $eligibleStudent -> delete();
        return redirect()->route('eligibleStudents.index')
            ->with('success','Product deleted successfully');
    }

    public function importstudents()
    {
        return view('eligibleStudents.importstudents');
    }
    public function uploadstudents(Request $request)
    {
        \Maatwebsite\Excel\Facades\Excel::import(new StudentsImport, $request->file);

        return redirect()->route('eligibleStudents.index')->with('success', 'User Imported Successfully');
    }
}
