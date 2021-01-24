<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'category_id'=>'required|int|exists:categories,id',
            'user_id'=>'nullable|int|exists:users,id',
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:1000',
            'topic'=>'nullable|string|max:2000',
            'image.*'=>'required|required_without:id|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'required' =>'هده الحقل مطلوب',
            'category_id'=>'required|int|exists:categories,id',
          //  'user_id'=>'required|int|exists:users,id',
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:1000',
            'topic'=>'nullable|string|max:2000',
            'image.*'=>'required|required_without:id|mimes:jpg,jpeg,png',
            'image.required_without'=> 'الصورة مطلوبة ',
        ];
    }
}
