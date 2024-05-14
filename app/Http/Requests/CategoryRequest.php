<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // It's important to remember
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|unique:categories|max:70',
                    'imagen' => 'max:70',
                ];
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|unique:categories,name,'.$this->get('id').'|max:70',
                    'imagen' => 'max:70',
                ];
            }
            default:
                # code...
                break;
        }
        return [
            //
        ];
    }
}
