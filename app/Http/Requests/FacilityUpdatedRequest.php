<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityUpdatedRequest extends FormRequest
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
            'title' => 'bail|required|string|max:191',
            'description' => 'bail|required|max:1500',
            'type' => 'bail|required|in:restaurant,meeting-event,facility',
            'attachment' => 'bail|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=460,min_height=340'
        ];
    }
}
