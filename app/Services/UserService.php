<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register(array $data): User
    {
        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user;
    }

    public function login(array $data, string $guard): ?Authenticatable
    {
        if (Auth::guard($guard)->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return auth()->user();
        }

        return null;
    }

    public function logout()
    {
        Auth::logout();
    }
}
