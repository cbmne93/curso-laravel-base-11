<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:500',
            'slug'  => 'required|min:3|max:500|unique:posts,slug,'. $this->route('post')->id,
            'description' => 'required|min:3|max:500',
            'content' => 'required|min:3|max:500',
            'posted' => 'required',
            'category_id' => 'required|integer'
        ];
    }
}
