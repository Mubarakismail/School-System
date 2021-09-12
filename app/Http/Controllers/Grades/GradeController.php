<?php

namespace App\Http\Controllers\Grades;

use App\Http\Requests\Grades\store;
use App\Models\Grade;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class GradeController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.Grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(store $request)
    {
        $validate = $request->validated();
        $Grade = new Grade();
        $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
        $Grade->Notes = $request->Notes;
        $Grade->save();
        toastr()->success(trans('grades_trans.saved_data'));
        return redirect()->route('Grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(store $request)
    {
        if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en', $request->Name_en)->exists()) {
            return redirect()->back()->withErrors(trans('grades_trans.exists'));
        }
        try {
            $validate = $request->validated();
            $Grade = Grade::findOrFail($request->id);
            $Grade->update([
                $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name],
                $Grade->Notes = $request->Notes,
            ]);
            toastr()->success(trans('grades_trans.saved_data'));
            return redirect()->route('Grades.index');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        Grade::findOrFail($request->id)->delete();
        toastr()->warning(trans('grade_trans.deleted_data'));
        return redirect()->route('Grades.index');
    }
}
