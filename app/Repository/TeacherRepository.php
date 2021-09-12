<?php

namespace App\Repository;

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class TeacherRepository implements TeacherRepositoryInterface
{
    protected $Teacher = null;

    public function getAllTeachers()
    {
        return Teacher::all();
    }
    public function Getspecialization()
    {
        return Specialization::all();
    }
    public function StoreTeachers($request)
    {
        try {
            $teacher = new Teacher();
            $teacher->Email = $request->Email;
            $teacher->Password = Hash::make($request->Password);
            $teacher->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $teacher->Specialization_id = $request->Specialization_id;
            $teacher->Gender = $request->Gender;
            $teacher->Address = $request->Address;
            $teacher->Joining_Date = $request->Joining_Date;
            $teacher->save();
            toastr()->success('Data Saved Successfully');
            return redirect()->route('Teachers.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }
    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender = $request->Gender;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success('Data updated Successfully');
            return redirect()->route('Teachers.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }
}
