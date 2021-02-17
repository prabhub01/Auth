<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'start_from' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.max' => 'Only upto 50 character is allowed in name field!',
            'price.required' => 'Price is Required and must be Numeric!',
            'start_form' => 'Please mention from where you wanna start your journey !',
            'state_id' => 'Please mention state ID !',
            'district_id' => 'District name is required. !',
        ];
    }
}
