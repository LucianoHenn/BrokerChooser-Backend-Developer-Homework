<?php

namespace App\Http\Requests\Tests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'test_name' => 'required|string|max:255',
            'test_type' => [
                'required',
                Rule::exists('test_types', 'id'),
            ],
            'variants' => [
                'required',
                'array',
                'min:2',
                function ($attribute, $value, $fail) {
                    foreach ($value as $index => $variant) {
                        $variantNameAttribute = $attribute . '.' . $index . '.name';
                        $targetingRatioAttribute = $attribute . '.' . $index . '.targeting_ratio';

                        // Validate name is a string and not longer than 255 characters
                        $variantNameRules = 'string|max:255';
                        $validator = validator(['name' => $variant['name']], ['name' => $variantNameRules]);
                        if ($validator->fails()) {
                            $fail("The $variantNameAttribute must be a string and may not be longer than 255 characters.");
                        }

                        // Validate targeting_ratio is an integer and positive
                        $targetingRatioRules = 'integer|min:1';
                        $validator = validator(['targeting_ratio' => $variant['targeting_ratio']], ['targeting_ratio' => $targetingRatioRules]);
                        if ($validator->fails()) {
                            $fail("The $targetingRatioAttribute must be a positive integer.");
                        }
                    }
                },
            ]
        ];
    }
}
