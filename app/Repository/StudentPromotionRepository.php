<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\PromotionStudent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository  implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Students.promotion.index', compact('Grades'));
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $students = Student::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)
                ->where('Section_id', $request->Section_id)
                ->where('Acadimic_year', $request->Acadimic_year)
                ->get();
            if ($students->count() > 0) {

                foreach ($students as $student) {
                    $ids = explode(',', $student->id);
                    Student::whereIn('id', $ids)->update([
                        'Grade_id' => $request->Grade_id_new,
                        'Classroom_id' => $request->Classroom_id_new,
                        'Section_id' => $request->Section_id_new,
                        'Acadimic_year' => $request->Acadimic_year_new,
                    ]);
                    PromotionStudent::updateOrCreate([
                        'student_id' => $student->id,
                        'from_grade' => $request->Grade_id,
                        'from_classroom' => $request->Classroom_id,
                        'from_section' => $request->Section_id,
                        'to_grade' => $request->Grade_id_new,
                        'to_classroom' => $request->Classroom_id_new,
                        'to_section' => $request->Section_id_new,
                        'from_academic_year' => $request->Acadimic_year,
                        'to_academic_year' => $request->Acadimic_year_new,
                    ]);
                }
                DB::commit();
                toastr()->success('Data Saved Successfully');
                return redirect()->back();
            } else {
                DB::rollback();
                return redirect()->back()->with('error_promotions', 'No Students in this table');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function create()
    {
        $promotions = PromotionStudent::all();
        return view('pages.Students.promotion.management', compact('promotions'));
    }
    public function destroy($request)
    {
        DB::beginTransaction();

        try {
            if ($request->page_id == 1) {

                $promotions = PromotionStudent::all();
                foreach ($promotions as $promo) {
                    $ids = explode(',', $promo->student_id);
                    Student::whereIn('id', $ids)->update([
                        'Grade_id' => $promo->from_grade,
                        'Classroom_id' => $promo->from_classroom,
                        'Section_id' => $promo->from_section,
                        'Acadimic_year' => $promo->from_academic_year,
                    ]);
                }
                PromotionStudent::truncate();
                DB::commit();
                toastr()->error(trans('Data Deleted Successfully'));
                return redirect()->back();
            } else {

                $promo = PromotionStudent::findOrFail($request->id);
                Student::where('id', $promo->student_id)->update([
                    'Grade_id' => $promo->from_grade,
                    'Classroom_id' => $promo->from_classroom,
                    'Section_id' => $promo->from_section,
                    'Acadimic_year' => $promo->from_academic_year,
                ]);
                PromotionStudent::destroy($promo->id);
                DB::commit();
                toastr()->error(trans('Data Deleted Successfully'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
