<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $Name
 * @property mixed $Name_en
 * @property mixed $Notes
 * @property mixed $id
 */
class GradesRequest extends FormRequest
{
    public function rules(): array
    {
        return [

            'Name' => "required|unique:Grades,Name->ar,$this->id",
            'Name_en' => "required|unique:Grades,Name->en,$this->id",

        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {

        return [
            'Name.required' => trans('validation.required', ['attribute' =>  trans('Grades_trans.stage_name_ar')]),
            'Name.unique' => trans('validation.unique', ['attribute' => trans('Grades_trans.stage_name_ar')]),

            'Name_en.required' => trans('validation.required', ['attribute' =>  trans('Grades_trans.stage_name_en')]),
            'Name_en.unique' =>trans('validation.unique', ['attribute' => trans('Grades_trans.stage_name_en')]),
        ];


    }


}
