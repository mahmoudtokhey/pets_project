<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar'         => 'required' ,
            'name_en'         => 'required' ,
        ];
    }
    public function message(): array
    {
        return [
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
        ];
    }


}
