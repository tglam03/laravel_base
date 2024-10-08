<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        return response()->json($data);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->except('image');

        if($request->hasFile('image')){
            $data['image'] = Storage::put('student', $request->file('image'));
        }
        Student::query()->create($data);

        return response()->json([], 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //

        return response()->json($student);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
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
        return response()->json($student);
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

        return response()->json([], 204);
    }

}
