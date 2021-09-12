<?php

namespace App\Repository;

use App\Models\BloodType;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationality;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface
{
    public function Students_show()
    {
        $students = Student::all();
        return view('pages.Students.index', compact('students'));
    }
    public function Create_Student()
    {
        $data['Grades'] = Grade::all();
        $data['bloods'] = BloodType::all();
        $data['nationals'] = Nationality::all();
        $data['parents'] = My_Parent::all();

        return view('pages.Students.create', $data);
    }
    public function Store_Student($request)
    {
        try {
            Student::create([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Email' => $request->Email,
                'Password' => Hash::make($request->Password),
                'Gender' => $request->Gender,
                'Birthday_Date' => $request->Birthday_Date,
                'Acadimic_year' => $request->Acadimic_year,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Section_id' => $request->Section_id,
                'Parent_id' => $request->Parent_id,
                'Nationality_id' => $request->Nationality_id,
                'Blood_type_id' => $request->Blood_type_id
            ]);
            toastr()->success('Data Saved Successfully');
            return redirect()->route('Students.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function Delete_Student($id)
    {
        Student::findOrFail($id)->delete();
        toastr()->error('Student Deleted Successfully');
        return redirect()->route('Students.index');
    }
    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['nationals'] = Nationality::all();
        $data['bloods'] = BloodType::all();
        $Students = Student::findOrFail($id);
        return view('pages.Students.edit', $data, compact('Students'));
    }
    public function Update_Student($request)
    {
        try {
            $student = Student::findOrFail($request->id);
            $student->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $student->Email = $request->Email;
            $student->Password = Hash::make($request->Password);
            $student->Gender = $request->Gender;
            $student->Birthday_Date = $request->Birthday_Date;
            $student->Acadimic_year = $request->Acadimic_year;
            $student->Grade_id = $request->Grade_id;
            $student->Classroom_id = $request->Classroom_id;
            $student->Section_id = $request->Section_id;
            $student->Parent_id = $request->Parent_id;
            $student->Nationality_id = $request->Nationality_id;
            $student->Blood_type_id = $request->Blood_type_id;
            $student->save();
            toastr()->success('Data Updated Successfully');
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
