<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed $skill
 */
class UpdateSkillRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        //validate field
        return [
            'name' => ['required', 'min:3', 'max:20'],
            // 'slug' => ['required', 'unique:skills,slug,'.$this->skill->id]
            'slug' => ['required', Rule::unique('skills')->ignore($this->skill)],
        ];
    }
}
