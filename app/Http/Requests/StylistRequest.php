<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StylistRequest extends FormRequest
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
     *zxz
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            return [
                'name' => 'required',
                'phone' => 'required',
                'excerpt' => 'required',
                'image' => 'required',
                'excerpt' => 'required',
            ];
    }
}
