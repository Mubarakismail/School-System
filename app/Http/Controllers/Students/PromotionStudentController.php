<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\PromotionStudent;
use App\Models\Section;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionStudentController extends Controller
{

    protected $promotionStudent;
    public function __construct(StudentPromotionRepositoryInterface $promotionStudent)
    {
        $this->promotionStudent = $promotionStudent;
    }
    public function index()
    {
        return $this->promotionStudent->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->promotionStudent->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->promotionStudent->store($request);
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromotionStudent  $promotionStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->promotionStudent->destroy($request);
    }
}
