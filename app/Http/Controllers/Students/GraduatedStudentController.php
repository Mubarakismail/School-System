<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\GraduatedStudent;
use App\Repository\GraduatedStudentsRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedStudentController extends Controller
{
    protected $Graduated;

    public function __construct(GraduatedStudentsRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->Graduated->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Graduated->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Graduated->SoftDelete($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GraduatedStudent  $graduatedStudent
     * @return \Illuminate\Http\Response
     */
    public function show(GraduatedStudent $graduatedStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GraduatedStudent  $graduatedStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(GraduatedStudent $graduatedStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GraduatedStudent  $graduatedStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Graduated->ReturnData($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GraduatedStudent  $graduatedStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);
    }
}
