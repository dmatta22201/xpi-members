<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UserCreateRequest extends FormRequest
{
    /**
     * This request is always authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|string|min:1|max:50',
            'lname' => 'required|string|min:1|max:50',
            'email' => 'required|string|email|min:1|max:255|unique:users',
            'birthdate' => 'required|date|dateFormat:m/d/Y|after:1/1/1924|before:' . Carbon::now()->subYears(18)->format('m/d/Y'),
            'password' => 'required|string|min:8|required_with:password_confirm|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }

    /**
     * Custom error messages for invalid data.
     */
    public function messages()
    {
        return [
            'fname.required' => 'First name is required',
            'fname.min' => 'First name must be at least 1 character',
            'fname.max' => 'First name must be at most 50 characters',
            'lname.required' => 'Last name is required',
            'lname.min' => 'Last name must be at least 1 character',
            'lname.max' => 'Last name must be at most 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.min' => 'Email must be at least 1 character',
            'email.max' => 'Email must be at most 255 characters',
            'email.unique' => 'Email already exists',
            'birthdate.required' => 'Birthdate is required',
            'birthdate.date' => 'Birthdate must be a valid date',
            'birthdate.dateFormat' => 'Birthdate must be in the format MM/DD/YYYY',
            'birthdate.after' => 'Birthdate must be after 1/1/1924',
            'birthdate.before' => 'You must be 18 or older to participate in XPI.',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Passwords do not match',
        ];
    }
}
