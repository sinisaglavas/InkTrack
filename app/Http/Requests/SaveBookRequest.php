<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveBookRequest extends FormRequest
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
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|unique:books|max:191',
            'year_of_publication' => 'required|integer|min:1500|max:' . date('Y'),
            'genre' => 'required',
            'status' => 'required|in:1,0',

        ];
    }
}
