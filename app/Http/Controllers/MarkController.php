<?php 

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::with('student')->get();
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $students = Student::all();
        return view('marks.form', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'term' => 'required',
            'subject' => 'required',
            'marks' => 'required|integer',
        ]);

        Mark::create($request->all());
        return redirect()->route('marks.index');
    }

    public function edit(Mark $mark)
    {
        $students = Student::all();
        return view('marks.form', compact('mark', 'students'));
    }

    public function update(Request $request, Mark $mark)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'term' => 'required',
            'subject' => 'required',
            'marks' => 'required|integer',
        ]);

        $mark->update($request->all());
        return redirect()->route('marks.index');
    }

    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('marks.index');
    }
}


?>