<?php
namespace App\Contracts\Services;

/**
 * Interface for Admin Service
 */
interface AdminServiceinterface
{
    /**
     * Get User List
     *
     * @return object
     */
    public function getUserlist(): object;

    /**
     * User Account Create
     *
     * @param array $data
     * @return void
     */
    public function createAccount(array $data): void;

    /**
     * Update Password
     *
     * @param array $data
     * @param void
     */
    public function updatePassword(array $data): void;

    /**
     * Update Profile
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(int $id, array $data): void;

    /**
     * Weekly User Data
     *
     * @return object
     */
    public function weeklyData(): object;

    /**
     * Weekly User Data
     *
     * @return object
     */
    public function monthlyData(): object;

    /**
     * Get Admin List
     *
     * @return object
     */
    public function getAdminlist(): object;

    /**
     * Admin Account Create
     *
     * @param array $data
     * @return void
     */
    public function createAdminAccount(array $data): void;

    /**
     * Admin Account Delete
     *
     * @param int $id
     * @return void
     */
    public function adminDelete(int $id): void;

    /**
     * User Account Delete
     *
     * @param int $id
     * @return void
     */
    public function userDelete(int $id): void;
}
