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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : [],
            'role' => ['required', 'string'], // ✅ role is required
        ])->validate();

        // Normalize role input (case-insensitive)
        $roleLower = strtolower($input['role'] ?? '');
        $allowed = ['registrar', 'faculty', 'student', 'guest'];

        if (! in_array($roleLower, $allowed, true)) {
            throw ValidationException::withMessages([
                'role' => ['The selected role is invalid.'],
            ]);
        }

        // Convert to proper format for DB enum
        $roleForDB = ucfirst($roleLower); // e.g. "student" -> "Student"

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $roleForDB, // ✅ saved properly
        ]);
    }
}
