<?php

namespace App\Http\Requests\room;

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
     
        $id=$this->route('room');
        return [
              'title' => 'required|unique:rooms,title,'.$id.',id',
              'price' => 'required|integer',
              'imageFile'=>'image',
        ];

    
    }
}
