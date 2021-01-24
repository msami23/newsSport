<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'message'=>'required|string|max:500',
            'name'=>'required|string|min:5',
            'email'=>'required|email',
            'subject'=>'required|string|min:10|max:100',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'هده الحقل مطلوب',
            'in'=>'القيم المدخلة غير صحيحة',
            'name.string'=>'اسم اللغة لابد ان يكون أحرف',
            'max'=>'هده الحقل لابد الا يزيد عن 10 احرف',
            'string'=>'هده الحقل لابد ان يكون احرف',
            'name.max'=>'اسم اللغة لابد ان يزيد عن 100 حرف',

        ];

    }
}
