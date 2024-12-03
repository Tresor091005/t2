<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CooperativeRequest extends FormRequest
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
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'filiere_id' => 'required|exists:filieres,id',
        ];
    }

    // public function prepareForValidation()
    // {
    //     $this->merge([
    //         'telephone' => str_starts_with($this->telephone, '01') ? $this->telephone : '01' . $this->telephone,
    //     ]);
    // }
}
