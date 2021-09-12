<?php

namespace App\Repository;

interface GraduatedStudentsRepositoryInterface
{

    public function index();
    public function store($request);
    public function create();
    public function destroy($request);
    public function SoftDelete($request);
    public function ReturnData($request);
}
