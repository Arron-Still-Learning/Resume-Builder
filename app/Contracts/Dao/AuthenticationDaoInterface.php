<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface AuthenticationDaoInterface
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
     * @return void
     */
    public function forgotPassword(string $token, array $data): void;

     /**
     * Reset Password
     *
     * @param array $data
     * @return void
     */
    public function resetPassword(array $data): void;

}
