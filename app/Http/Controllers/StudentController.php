<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('students.index', ['students' => Student::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $classroom = Classroom::all();
        $classrooms = Classroom::all();
        // $classrooms = DB::table('classrooms')->get();
        // return view('students.create', ['classrooms' => $classrooms]);
        return view('students.create', compact('classrooms'));
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
            'StudentName' => 'required',
            'StudentEmail' => 'required'
        ]);
        $StudentName = $request->input('StudentName');
        $StudentEmail = $request->input('StudentEmail');
        $StudentGender = $request->input('StudentGender');
        $ClassRoomID = $request->input('ClassRoomID');
        $validateData = $request->validate([
            'StudentName' => 'required',
            'StudentEmail' => 'required',
        ]);

        DB::table('students')->insert([
            'StudentName' => $StudentName,
            'StudentEmail' => $StudentEmail,
            'StudentGender' => $StudentGender,
            'ClassRoomID' => $ClassRoomID,
        ]);
        return redirect()->route('students.index')->with('success', 'Student Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $classrooms = Classroom::all();
        return view('students.edit', [
            'classrooms' => $classrooms,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $StudentName = $request->input('StudentName');
        $StudentEmail = $request->input('StudentEmail');
        $StudentGender = $request->input('StudentGender');
        $ClassRoomID = $request->input('ClassRoomID');
        $validateData = $request->validate([
            'StudentName' => 'required',
            'StudentEmail' => 'required',
        ]);

        $student->update([
            'StudentName' => $StudentName,
            'StudentEmail' => $StudentEmail,
            'StudentGender' => $StudentGender,
            'ClassRoomID' => $ClassRoomID,
        ]);
        return redirect()->route('students.index')->with('success', 'Student Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Data deleted successfully');
    }
}
