<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
    
        Validator::make($input, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms'    => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : [],
            'role'     => ['required', 'string'],
        ])->validate();

    
        $allowedRoles = [
            'registrar' => 'Registrar',
            'faculty'   => 'Faculty',
            'student'   => 'Student',
            'guest'     => 'Guest',
        ];

    
        $roleKey = strtolower(trim($input['role']));

        if (! array_key_exists($roleKey, $allowedRoles)) {
            throw ValidationException::withMessages([
                'role' => ['The selected role is invalid. Allowed roles: ' . implode(', ', $allowedRoles)],
            ]);
        }

        return User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            'role'     => $allowedRoles[$roleKey], // Always stored with proper formatting
        ]);
    }
}
