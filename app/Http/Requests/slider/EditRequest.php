<?php

namespace App\Http\Requests\slider;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title'=>'required' ,
            'subtitle'=>'required' ,
            'imageFile' => 'image',//|mimes:jpg|max:100
        ];
    }
    public function messages()
    {
        $id=$this->route('sliders');
        return [
            'title.required' => 'Please enter Product Title'
        ];
    }
}
