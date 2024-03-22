<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'experiment_name' => 'required|string|max:255',
            // 'experiment_id' => 'required|string|string',
            'variants' => 'array|min:2',
        ];
    }
}
