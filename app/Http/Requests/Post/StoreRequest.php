<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @retur, \Illuminate\Contracts\Validation\ValidationRule|array>
     */
    public function rules(): array
    {
        return [

        'title' => 'required|min:3|max:500',
        'slug'  => 'required|min:3|max:500|unique:posts',
        'description' => 'required|min:3|max:500',
        'content' => 'required|min:3|max:500',
        'posted' => 'required',
        'category_id' => 'required|integer'

        ];

    }
}
