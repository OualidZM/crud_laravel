<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestValidation extends FormRequest
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
            'name'=> 'required|min:6|max:28',
            'age' => 'required|min:1',
            'bornDate' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'agrement'=>'required',
            'userProfile' => 'required|image|mimes:jpeg,jpg,png,gif,webp'
        ];
    }
}
