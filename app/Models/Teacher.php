<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    public $fillable = ['Name'];

    public function specializations(Type $var = null)
    {
        return $this->belongsTo('App\Models\Specialization','Specialization_id');
    }
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section');
    }
}
