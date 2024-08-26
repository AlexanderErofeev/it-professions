<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillsStoreRequest extends FormRequest
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
                'title' => 'required|string|min:3|max:255',
                'slug' => 'required|alpha_num:ascii|max:255|unique:skills,slug',
                'short_description' => 'string|min:5|max:255|nullable',
                'description'=> 'sometimes',
                'image_path' => 'required|image|max:2048|dimensions:min_width=400,min_height=200,max_width=1000,max_height=1000',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Название',
            'slug' => 'URL-имя',
            'short_description' => 'Короткое описание',
            'description'=> 'Полное описание',
            'image_path' => 'Изображение',
        ];
    }
}
