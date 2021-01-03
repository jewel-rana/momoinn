<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantCreatedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room_type_id' => 'bail|required|integer|exists:room_types,id',
            'title' => 'bail|required|string|max:191',
            'description' => 'bail|required',
            'room_no' => 'bail|required|string',
            'floor_no' => 'bail|required|integer',
            'sell_price' => 'bail|required|integer',
            'offer_price' => 'bail|required|integer'
        ];
    }
}
