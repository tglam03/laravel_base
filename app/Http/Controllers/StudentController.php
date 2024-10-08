<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Student::query()->latest('id')->paginate(5);
        return view('students.index' , compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest  $request)
    {
         //  sử dụng request lớp studentRequest

        //  dd($request->all());

        $data = $request->except('image');

        if($request->hasFile('image')){
            $data['image'] = Storage::put('student', $request->file('image'));
        }

        Student::query()->create($data);

        return redirect()->route('students.index')
            ->with('success', 'Thao tac thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {

        $data = $request->except('image');

        if($request->hasFile('image')){
            $data['image'] = Storage::put('students', $request->file('image'));
        }
        $student->update($data);

        $currentPathImage = $student->image;

        if($request->hasFile('image') && Storage::exists($currentPathImage)){
            Storage::delete('image');
        }
        return redirect()->route('students.index')
            ->with('success', 'Thao tac thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        if(Storage::exists($student->image)){
            Storage::delete($student->image);
        }

        return back()
            ->with('success', 'Thao tac thanh cong');
    }
}
