<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\Students\StudentRequest;
use App\Models\Classroom;
use App\Models\Section;
use App\Repository\StudentRepositoryInterface;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student;
    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }

    public function index()
    {
        return $this->Student->Students_show();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Student->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        return $this->Student->Store_Student($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Student->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Student->Update_Student($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request->id);
    }

    public function Get_Sections($id)
    {
        $Sections = Section::where('Class_id', $id)->pluck('Name_section', 'id');
        return $Sections;
    }

    public function Get_classrooms($id)
    {
        $classrooms = Classroom::where('Grade_id', $id)->pluck('Name', 'id');
        return $classrooms;
    }
}
