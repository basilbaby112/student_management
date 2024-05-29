<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('teacher')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('students.form', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.form', compact('student', 'teachers'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
