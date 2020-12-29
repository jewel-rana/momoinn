<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponCreatedRequest extends FormRequest
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
            'name' => 'bail|required|string|max:191',
            'description' => 'bail|nullable|string',
            'code' => 'bail|required|unique:coupons,code',
            'amount' => 'bail|required|numeric',
            'type' => 'bail|nullable|in:percent,flat',
            'start_date' => 'bail|required',
            'end_date' => 'bail|required'
        ];
    }
}
