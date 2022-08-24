<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|max:255',
            'type' => 'required|max:100',
            'code' => 'required|max:55|unique:products,code',
            'brand' => 'required|max:255',
            'price' => 'required|numeric|max:999999999999',
            'description' => 'nullable|max:1000',
            'image' => 'nullable',
            'status' => 'nullable|in:1,0',
        ];
    }
}
