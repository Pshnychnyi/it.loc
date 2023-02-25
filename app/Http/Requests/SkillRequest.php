<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'percent' => 'required|integer',
            'category' => 'present'
        ];
    }

    public function messages() {
    	return [
    		'required' => 'Поле :attribute должно быть заполнено',
	    	'string' => 'Данные поля :attribute должны быть строчного типа',
	    	'integer' => 'Данные поля :attribute должны быть числового типа',
	    	'max' => 'Поле :attribute должно содержать не более 100 символов'
    	];
    	
    }
}
