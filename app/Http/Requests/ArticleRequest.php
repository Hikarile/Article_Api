<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRequest extends FormRequest
{
    public function rules() : array
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'id'            => 'required|numeric|exists:articles,id',
                ];
            case 'POST':
                return [
                    'id'            => 'required|numeric',
                    'language_code' => [
                        'required',
                        'string',
                        'regex:/^(en|zh|ja)$/'
                    ],
                    'title'         => 'required|string|max:20',
                    'content'       => 'required|string',
                ];
            case 'DELETE':
                return [
                    'id'            => 'required|numeric|exists:articles,id',
                ];
        }
    }

    public function messages()
    {
        return [
            'id.required' => 'Article ID is required.',
            'id.exists' => 'Article ID does not exist.',
            'id.numeric' => 'Article ID must be a numeric.',
            'language_code.required' => 'Language code is required.',
            'language_code.string' => 'Language code must be a string.',
            'language_code.regex' => 'language code must be either "en", "zh", or "ja".',
            'title.required' => 'Title is required.',
            'title.string' => 'Title must be a string.',
            'title.max' => 'Title may not be greater than 20 characters.',
            'content.required' => 'Content is required.',
            'content.string' => 'Content must be a string.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
