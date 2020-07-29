<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
                'check_in'=> 'required',
                'check_out'=> 'required',
                'room_id'=> 'required',
                 //  'adults'=> 'required',

               
	     	];	
    }
}
