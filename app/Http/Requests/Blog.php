<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Blog extends FormRequest
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
            'post' => 'required|min:400',
            'thumbnail' => 'file|image|max:2048',
            'image_post' => 'file|image|max:2048'
        ];
    }
}
