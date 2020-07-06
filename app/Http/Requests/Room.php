<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Room extends FormRequest
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
            'size' => 'required|numeric|digits_between:1,2',
            'capacity' => 'required',
            'budget' => 'required|numeric|digits_between:1,8',
            'description' => 'required|min:400',
            'thumbnail' => 'file|image|dimensions:min_width=1920,min_height=1080|max:2048'
        ];
    }
}
