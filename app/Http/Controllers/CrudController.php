<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Student";
        $students = Student::all();

        return view('student.index', ['title' => $title, 'students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Student | Create";
        $majors = Major::all();
        return view('student.create', ['title' => $title, 'majors' => $majors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:15|unique:students',
            'nama' => 'required|max:50',
            'umur' => 'numeric',
            'id_jurusan' => 'numeric',
        ]);


        Student::create($validatedData);
        return redirect('/student')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $title = "Detail";
        $majors = Major::all();

        return view('student.detail', ['title' => $title, 'student' => $student, 'majors' => $majors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $title = "Edit";
        $majors = Major::all();
        return view('student.edit', ['title' => $title, 'student' => $student, 'majors' => $majors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'nama' => 'required|max:50',
            'umur' => 'numeric',
            'id_jurusan' => 'numeric',
        ];

        if ($request->nim != $student->nim) {
            $rules['nim'] = 'required|max:15|unique:students';
        }

        $validatedData = $request->validate($rules);
        Student::where('id', $student->id)
            ->update($validatedData);

        return redirect('/student')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/student')->with('success', 'Data berhasil dihapus!');
    }
}
