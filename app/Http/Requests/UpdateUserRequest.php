<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->route('user');
        return $this->user()->can('update', $user);
    }

    public function rules(): array
    {
        $userId = $this->route('user')->id;

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
            'password' => ['nullable','string','min:8','confirmed'],
            'theme' => ['nullable','in:light,dark'],
            'is_admin' => ['nullable','boolean'],
        ];
    }

    /** Ensure name pair is unique */
    protected function prepareForValidation(): void
    {
        // nothing needed here; see withValidator below
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $exists = \App\Models\User::where('first_name', $this->first_name)
                ->where('last_name', $this->last_name)
                ->where('id', '!=', $this->route('user')->id)
                ->exists();

            if ($exists) {
                $validator->errors()->add('first_name', 'That first/last name combination is already taken.');
            }
        });
    }
}
