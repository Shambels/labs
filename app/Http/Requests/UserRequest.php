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
            'password' => 'max:100',
            'roles_id' => 'integer|mt:1',
            'image' => 'image',
            'title' => 'bail|max: 75',
            'bio' => 'nullable|max:500'
        ];
    }
}
