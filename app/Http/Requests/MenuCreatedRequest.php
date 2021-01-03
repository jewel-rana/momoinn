<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuCreatedRequest extends FormRequest
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
            'slug' => 'bail|required|string|max:191',
            'description' => 'bail|nullable|string|max:255',
            'menu_class' => 'bail|nullable|string|max:191',
            'menu_position' => 'bail|required|numeric|min:0|max:99',
            'parent_id' => 'bail|nullable|numeric|exists:menus,id'
        ];
    }
}
