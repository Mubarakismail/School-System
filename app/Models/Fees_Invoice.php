<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fees_Invoice extends Model
{
    protected $table='fees_invoices';
    public function student()
    {
        return $this->belongsTo(Student::class,'Student_id');
    }
    public function Fees()
    {
        return $this->belongsTo(Fee::class,'Fee_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }
}
