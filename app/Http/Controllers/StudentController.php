<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index',['data_students' => Student::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = DB::table('classrooms')->get();
        return view('students.create',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $request->validate([
            'StudentName' => 'required',
        ]);
        $NameStudent = $request->input('StudentName');
        $GenderStudent = $request->input('StudentGender');
        $IDClass = $request->input('IDClassroom');



        DB::table('students')->insert([
            'NameStudent' => $NameStudent,
            'GenderStudent' => $GenderStudent,
            'IDClass' => $IDClass
        ]);

        return redirect()->route('students.index')->with('success','Student Added success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classrooms = DB::table('classrooms')->get();
        return view('students.edit', [
            'classrooms' => $classrooms,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $request->validate([
            'StudentName' => 'required',
        ]);

        $NameStudent = $request->input('StudentName');
        $GenderStudent = $request->input('StudentGender');
        $IDClass = $request->input('IDClassroom');

        DB::table('students')->update([
            'NameStudent' => $NameStudent,
            'GenderStudent' => $GenderStudent,
            'IDClass' => $IDClass
        ]);
        return redirect()->route('students.index')->with('success','Student have been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('students.index')->with('success','Student have been deleted successfully!');
    }
}
