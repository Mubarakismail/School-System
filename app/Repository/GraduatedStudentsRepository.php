<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;

class GraduatedStudentsRepository  implements GraduatedStudentsRepositoryInterface
{
    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index', compact('students'));
    }
    public function store($request)
    {
    }
    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create', compact('Grades'));
    }
    public function destroy($request)
    {
        Student::onlyTrashed()->where('id',$request->id)->forceDelete();
        toastr()->error('Student Deleted permentally');
        return redirect()->route('Graduated.index');
    }
    public function SoftDelete($request)
    {
        $students = Student::where('Grade_id', $request->Grade_id)
            ->where('Classroom_id', $request->Classroom_id)->where('Section_id', $request->Section_id)->get();
        if (!$students->count()) {
            return redirect()->back()->withErrors(['error' => 'No Graduated Students in Table']);
        }

        foreach ($students as $student) {
            $ids = explode(',', $student->id);
            Student::whereIn('id', $ids)->Delete();
        }
        toastr()->success('Data Deleted Successfully');
        return redirect()->route('Graduated.index');
    }
    public function ReturnData($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success('Student Returned Successfully');
        return redirect()->back();
    }
}
