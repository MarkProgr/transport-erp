<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function registerForm(): Factory|View|Application
    {
        return view('users.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->service->register($request->validated());

        return redirect()->route('login.form');
    }

    public function loginForm(): Factory|View|Application
    {
        return view('users.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $user = $this->service->login($request->validated(), 'web');

        if ($user) {
            $request->session()->regenerate();

            return redirect()->route('welcome');
        }

        session()->flash('error', 'Provided credentials are incorrect');

        return redirect()->back();
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->service->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
