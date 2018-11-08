<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|max:25|unique:users',
            'email' => 'bail|email|unique:users',
            'password' => 'max:32',
            'roles_id' => 'integer|mt:1',
            'image' => 'image',
            'title' => 'bail|required|max: 75',
            'bio' => 'nullable|max:500'
        ];
    }
}
