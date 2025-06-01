<?php
namespace App\Contracts\Services;
use Illuminate\Http\RedirectResponse;

/**
 * Interface for Authentication
 */
interface AuthenticationServiceInterface
{

    /**
     * Register
     *
     * @param array $data
     * @return void
     */
    public function register(array $data): void;

    /**
     * Forgot Password
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotPassword(array $data): RedirectResponse;

    /**
     * Reset Password
     *
     * @param array $data
     * @return void
     */
    public function resetPassword(array $data): void;
}
