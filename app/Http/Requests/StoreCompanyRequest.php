<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:companies',
            'phone' => 'required|unique:companies',
            'website' => 'required',
            'file' => 'required|file|image|dimensions:width=100,height=100'
        ];
    }
}
