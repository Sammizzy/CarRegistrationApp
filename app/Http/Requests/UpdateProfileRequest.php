<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // we’ll authorize in controller via policy against auth()->user()
    }

    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'car_registration' => [
                'required','string','max:255',
                Rule::unique('users','car_registration')->ignore($userId),
            ],
            'email' => [
                'required','email','max:255',
                Rule::unique('users','email')->ignore($userId),
            ],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $exists = \App\Models\User::where('first_name', $this->first_name)
                ->where('last_name', $this->last_name)
                ->where('id', '!=', $this->user()->id)
                ->exists();

            if ($exists) {
                $validator->errors()->add('first_name', 'That first/last name combination is already taken.');
            }
        });
    }
}
