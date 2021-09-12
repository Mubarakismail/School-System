<?php

namespace App\Http\Requests\Grades;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Name'=>'required|unique:Grades,Name->ar,'.$this->id,
            'Name_en'=>'required|unique:Grades,Name->en,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'Name.required'=>trans('validation.required'),
            'Name_en.required'=>trans('validation.required'),
        ];
    }
}
