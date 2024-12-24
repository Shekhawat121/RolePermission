<?php

namespace Modules\EmployeeManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
                'employee_id' => 'required|unique:employees,employee_id',
                'name' => 'required|max:255',
                'email' => 'required|email|unique:employees,email',
                'dob' => 'required|date',
                'doj' => 'required|date',
            ];       
    }



    public function messages()
    {
        return [
            'employee_id.required' => 'The employee ID is required.',
            'employee_id.unique' => 'The employee ID has already been taken.',
            'name.required' => 'The employee name is required.',
            'name.max' => 'The employee name may not be greater than 255 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email format.',
            'email.unique' => 'The email address has already been taken.',
            'dob.required' => 'The date of birth is required.',
            'dob.date' => 'The date of birth must be a valid date.',
            'doj.required' => 'The date of joining is required.',
            'doj.date' => 'The date of joining must be a valid date.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
