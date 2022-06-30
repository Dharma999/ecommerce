<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'title'=>'required',
        'status'=>'required',
        'summary'=>'required',
        'description'=>'nullable',
        'size'=>'required',
        'color'=>'required',
        'meta_title'=>'nullable',
        'meta_keywords'=>'nullable',
        'meta_description'=>'nullable',
        'price'=>'required',
        'qty'=>'required',
        'category'=>'required',
        ];
    }
}
