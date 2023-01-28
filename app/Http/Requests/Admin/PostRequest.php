<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|string',
            'slug'=>'required|string',
            'image'=>'nullable',
            'status'=>'nullable',
            'description'=>'required|string',
            'category_id'=>'required',
            'tag_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
        'category_id.required'=>'category is required',
        'tag_id.required'=>'Tag is required',

        ];
    }
}
