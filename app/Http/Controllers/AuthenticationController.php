<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Contracts\Services\AuthenticationServiceInterface;

class AuthenticationController extends Controller
{
    /**
     * Authentication interface
     */
    private $authenticationService;

    /**
     * Create new controller instance
     *
     * @param AuthenticationServiceInterface $AuthenticationServiceInterface
     * @param void
     */
    public function __construct(AuthenticationServiceInterface $AuthenticationServiceInterface)
    {
        $this->authenticationService = $AuthenticationServiceInterface;
    }

    /**
     * Welcome Page
     *
     * @return view welcome page
     */
    public function welcomePage(): View
    {
        return view('welcome');
    }

    /**
     * Login Page
     *
     * @return view login page
     */
    public function loginPage(): View
    {
        return view('auth.login');
    }

    /**
     * Login
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $input_data = Auth::guard('web')->attempt([
            'email' => $request->email, 'password' => $request->password
        ]);
        if ($input_data) {
            return redirect()->route('user.list');
        }
        return redirect()->back()->withErrors(['email' => 'Email is wrong', 'password' => 'Password is wrong']);
    }

    /**
     * Register
     *
     * @return view Register page
     */
    public function registerPage(): View
    {
        return view('auth.register');
    }

    /**
     * Register
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->authenticationService->register($request->only([
            'name',
            'email',
            'password'
        ]));
        return redirect()->route('login.page');
    }

    /**
     * Logout
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

     /**
     * Forgot Password Page
     *
     * @return view Forgot Password Page
     */
    public function forgotpassword_page()
    {
        return view('auth.forgotpassword');
    }

     /**
     * Forgot Password
     *
     * @param \App\Http\Requests\ForgotPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotpassword(ForgotPasswordRequest $request): RedirectResponse
    {
        $this->authenticationService->forgotPassword($request->only([
            'email'
        ]));
        return redirect()->back();
    }

     /**
     * Reset Password Page
     *
     * @return view Reset Password Page
     */
    public function resetPassword_page($token) {

        return view('auth.resetpassword', ['token' => $token]);
    }

     /**
     * Reset Password
     *
     * @param \App\Http\Requests\ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        //  dd($request->toArray());
        $this->authenticationService->resetPassword($request->only([
            'token',
            'email',
            'password'
        ]));
        return redirect('login');
    }
}
