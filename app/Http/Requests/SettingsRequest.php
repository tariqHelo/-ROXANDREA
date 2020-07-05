<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'title' => ['required'] ,
            'email' => ['required' , 'email:rfc,dns'] ,
            'facebook' => ['regex:^facebook\.com\S*[a-zA-Z0-9_]*^'],
            'twitter' =>[ 'regex:^twitter\.com\S*[a-zA-Z0-9_]*^'],
            'instagram' => ['regex:^instagram\.com\S*[a-zA-Z0-9_]*^'],
            'address'  => ['required' , 'regex:/([- ,\/0-9a-zA-Z]+)/'],
            'phone' => ['regex:/[0-9]{9,12}/' , 'required'] ,
        ];
    }
}
