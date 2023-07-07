<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:6', 'unique:types,name']
        ];
    }

    public function messages() : array{
        return [
            'name.required' => 'Tên thể loại không được để trống',
            'name.min' => 'Tên thể loại có tối thiểu 6 kí tự',
            'name.unique' => 'Tên thể loại đã tồn tại'
        ];
    }
}
