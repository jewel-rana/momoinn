<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatedRequest extends FormRequest
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
            'branch_id' => 'bail|required|integer|exists:branches,id',
            'name' => 'bail|required|string|max:191',
            'email' => 'bail|required|unique:users,email,' . $this->user,
            'mobile' => 'bail|required|regex:/^(01){1}[3456789]{1}(\d){8}$/|unique:users,mobile,' . $this->user,
            'password' => 'bail|nullable|same:password_confirm|min:8|max:32',
            'role' => 'bail|required|integer|exists:roles,id'
        ];
    }
}
