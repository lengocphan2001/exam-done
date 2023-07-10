<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'name' => ['string', 'required'],
            'duration' => ['required']
        ];
    }


    public function messages()
    {
        return [
            'name.string' => 'Tên bài thi không hợp lệ',
            'name.required' => 'Tên bài thi không được để trống',
            'duration.required' => 'Thời gian làm bài không được để trống'
        ];
    }
}