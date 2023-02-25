<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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


    protected function getValidatorInstance() {
    	$validator = parent::getValidatorInstance();

    	$validator->sometimes('img', 'required|image', function($input) {

    		if(!$this->route()->hasParameter('review')) {
    			
    			return true;
    		}

    		return false;
    	});

    	return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200|string',
            'position' => 'required|max:200|string',
            'desc' => 'required|string',
        ];
    }

    public function messages() {
    	return [
    		'required' => 'Поле :attribute обязательно к заполнению',
    		'max' => 'Поле :attribute слишком длинное',
    		'image' => 'Поле :attribute должно содержать обьект типа фото',
    		'string' => 'Поле :attribute должно содержать данные строчного типа',

    	];
    }
}
