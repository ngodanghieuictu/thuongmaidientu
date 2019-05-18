<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nameproduct.vi' => 'required|max:255',
            'brandproduct.vi' => 'required|max:255',
            'nameproduct.en' => 'nullable|max:255',
            'brandproduct.en' => 'nullable|max:255',
            'descriptionproduct.vi' => 'required',
        ];
    }
}
