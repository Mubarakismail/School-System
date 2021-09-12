<?php

namespace App\Repository;

interface StudentRepositoryInterface
{
    public function Students_show();
    public function Create_Student();
    public function Store_Student($request);
    public function Delete_Student($id);
    public function Edit_Student($id);
    public function Update_Student($request);
}

