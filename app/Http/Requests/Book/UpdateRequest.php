<?php

namespace App\Http\Requests\Book;

use App\Models\Author;
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
            'author_id' =>  [
                'required',
                'exists:' . Author::class . ',id'
            ],
            'title' =>  [
                'required',
                'string'
            ],
            'description'   =>  [
                'nullable',
                'string'
            ],
            'publish_date'  =>  [
                'required',
                'date'
            ]
        ];
    }
}
