<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\This;

class MenuRequest extends FormRequest
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
            'title' => ['required' , 'unique:menus,title,'.$this->id.',id'] ,
            'url' => ['required_if:is_route,0'] ,
            'routes' => ['required_if:is_route,1'] ,
            'parent_id' => ['required'] ,
        ];
    }
}
