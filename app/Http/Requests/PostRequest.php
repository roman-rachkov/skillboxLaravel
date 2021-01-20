<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Rules\English;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($this->id),
                'max:150',
                new English
            ],
            'name' => 'required|max:100|min:5',
            'shortDesc' => 'required|max:250',
            'longDesc' => 'required',
            'published' => '',
            'tags' => ''
        ];
    }
}
