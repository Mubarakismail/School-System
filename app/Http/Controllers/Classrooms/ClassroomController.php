<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classrooms\store;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('pages.classrooms.index', compact('classrooms', 'grades'));
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
        $classrooms = $request->List_Classrooms;
        try {

            $validate = $request->validated();
            foreach ($classrooms as $classroom) {
                $newClassroom = new Classroom();
                $newClassroom->Name = ['en' => $classroom['Name_en'], 'ar' => $classroom['Name']];
                $newClassroom->Grade_id = $classroom['Grade_id'];
                $newClassroom->save();
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('classroom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
    public function update(Request $request)
    {
        try {

            $updatedClassroom = Classroom::findOrFail($request->id);
            $updatedClassroom->update([
                $updatedClassroom->Name = ['en' => $request->Name_en, 'ar' => $request->Name],
                $updatedClassroom->Grade_id = $request->Grade_id,
            ]);
            toastr()->success('Classroom Updated successfully');
            return redirect()->route('classroom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', $e->getMessage());
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
        Classroom::findOrFail($request->id)->delete();
        toastr()->warning('Classroom deleted successfully');
        return redirect()->route('classroom.index');
    }
    public function deleteAll(Request $request)
    {
        $delete_all_ids=explode(",",$request->delete_all_id);
        Classroom::whereIn('id',$delete_all_ids)->delete();
        toastr()->error('all selected classrooms removed successfully');
        return redirect()->route('classroom.index');
    }
}
