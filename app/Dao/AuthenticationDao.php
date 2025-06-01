<?php

namespace App\Dao;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\AuthenticationDaoInterface;

class AuthenticationDao implements AuthenticationDaoInterface
{
    /**
     * Register
     *
     * @param array $data
     * @return void
     */
    public function register(array $data): void
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
      /**
     * Forgot Password
     *
     * @param array $data
     * @return void
     */
    public function forgotPassword($token, array $data): void
    {
        DB::table('password_reset_tokens')->insert([
            'email' => $data['email'],
            'token' => $token,
        ]);
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
        DB::table('password_reset_tokens')->where('token',$data['token'])->delete();
        User::where('email',$data['email'])->update([
            'password' => Hash::make($data['password'])
        ]);
    }
}
