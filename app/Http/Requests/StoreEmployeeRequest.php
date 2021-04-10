<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends UpdateEmployeeRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees',
            'company_id' => 'required'
        ];
    }
}
