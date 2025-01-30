<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->city = $request->city;
        $student->address = $request->address;
        $student->courseId = $request->courseId;
        $student->save();

        // return redirect()->back()->with('message',"Stored Successfully");
        return redirect()->route('student.index');
    }
    public function edit($id)
    {
    $students = student::find($id);
    return view('student.edit',compact('students'));
    }
    public function update(Request $request, Student $student)
    {

        $id = $request->id;

        $student =  Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->city = $request->city;
        $student->address = $request->address;
        $student->courseId = $request->courseId;
        $student->save();

        return redirect()->back()->with('message',"update Successfully");

    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('message',"Deleteeeeee hooo gayaaaa");


    }
}
