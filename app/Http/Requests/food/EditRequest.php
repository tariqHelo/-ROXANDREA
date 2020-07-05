<?php

namespace App\Http\Requests\food;

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
            'title' => 'required',
            'price' => 'required',
            'details' => 'required',
            'imageFile' => 'required|image',
        ];
    }
}
