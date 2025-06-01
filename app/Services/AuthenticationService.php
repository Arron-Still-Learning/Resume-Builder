<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use App\Contracts\Dao\AuthenticationDaoInterface;
use App\Contracts\Services\AuthenticationServiceInterface;

/**
 * Student Service class
 */
class AuthenticationService implements AuthenticationServiceInterface
{
    /**
     * Authentication Dao
     */
    private $authenticationDao;

    /**
     * Class Constructor
     * @param AuthenticationDaoInterface
     * @return void
     */
    public function __construct(AuthenticationDaoInterface $AuthenticationDao)
    {
        $this->authenticationDao = $AuthenticationDao;
    }


    /**
     * Register
     *
     * @param array
     * @return void
     */
    public function register(array $data): void
    {
        $this->authenticationDao->register($data);
    }

    /**
     * Forgot Password
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotPassword(array $data): RedirectResponse
    {
        $email = User::where('email', $data['email'])->exists();

        if ($email) {
            $token = Str::random(64);
            $this->authenticationDao->forgotPassword($token, $data);
            Mail::send(
                'auth.resetpasswordmail',
                ['token' => $token],
                function ($message) use ($data) {
                    $message->to($data['email']);
                    $message->subject('Reset Password');
                }
            );
            return redirect()->back()->with(['success' => 'Mail Send Success']);
        } else {
            return redirect()->back()->withErrors(['email' => 'Email does not exist in our database']);
        }
    }

    /**
     * Reset Password
     *
     * @param array $data
     * @return void
     */
    public function resetPassword(array $data): void
    {
        // dd($data);
        // $token = DB::table('password_reset_tokens')->where('token', $data['token'])->first()->token;
        // $email = DB::table('password_reset_tokens')->where('token', $data['token'])->first()->email;
        // if ($data['token'] === $token && $data['email'] == $email) {
        //     $this->authenticationDao->resetPassword($data);
        // }

        $record = DB::table('password_reset_tokens')->where('token', $data['token'])->first();

        if ($record && $record->email === $data['email']) {
            $this->authenticationDao->resetPassword($data);
        } else {
            // Handle the error, e.g., by throwing an exception or returning an error response
            throw new \Exception('Invalid token or email');
        }
    }
}
