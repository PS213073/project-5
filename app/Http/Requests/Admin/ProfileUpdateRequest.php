<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', 'unique:users,email,' . auth()->user()->id],
        ];
    }

    public function messages()
{
    return [
        'image.image' => 'The selected file must be an image.',
        'image.max' => 'The image may not be greater than 3000 kilobytes.',
    ];
}
}
