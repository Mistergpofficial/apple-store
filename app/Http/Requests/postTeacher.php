<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postTeacher extends FormRequest
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
          //  'teacher_status' => 'required|not_in:0',
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phonenum' => 'required|min:11',
            'dob' => 'required|date',
            'age' => 'required|digits:2',
            'address' => 'required',
            'country' => 'required|not_in:0',
            'region' => 'required|not_in:0'
        ];
    }
}
