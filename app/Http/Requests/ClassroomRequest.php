<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $id
 * @property mixed $List_Classes
 * @property mixed $Name_class_ar
 * @property mixed $Name_class_en
 * @property mixed $Grade_Id
 */
class ClassroomRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'List_Classes.*Name_class_ar' => "required",
            'List_Classes.*Name_class_en' => "required",
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {

        return [
            'Name_class_ar.required' => trans('validation.required', ['attribute' =>  trans('My_Classes_trans.stage_name_ar')]),

            'Name_class_en.required' => trans('validation.required', ['attribute' =>  trans('My_Classes_trans.stage_name_en')]),
        ];


    }
}
