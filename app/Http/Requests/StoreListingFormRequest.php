<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreListingFormRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body'  => 'required|max: 2500',
            'category_id'  => [
                'required',
                Rule::exists('categories', 'id')->where(function($query){
                    $query->where('usable', true);
                })
            ],
            'area_id'  => [
                'required',
                Rule::exists('areas', 'id')->where(function($query){
                    $query->where('usable', true);
                })
            ]    
        ];
    }
}
