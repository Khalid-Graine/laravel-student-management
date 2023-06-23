<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;

class StudentsController extends Controller
{

    public function index(Request $request)
    {

        $searchQuery = $request->query('query') ?? '';
        if ($searchQuery) {
            $students = Students::where('name', 'LIKE', "%{$searchQuery}%")->paginate(10);
        } else {
            $students = Students::latest()->paginate(5);
        }

        return view('students.index', compact('students', 'searchQuery'));
    }




    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {

        $student = $request->validated();
        $student['image'] = $request->file('image')->store('students', 'public');
        Students::create($student);

        return redirect()->route('students.index');
    }




    public function show(Students $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Students $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Students $student)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index');
    }


    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
