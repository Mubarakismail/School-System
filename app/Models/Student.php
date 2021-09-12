<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable = [
        'Name', 'Email', 'Password', 'Gender', 'Nationality_id',
        'Blood_type_id', 'Birthday_Date', 'Grade_id', 'Classroom_id', 'Section_id',
        'Parent_id', 'Acadimic_year'
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'Section_id');
    }
}
