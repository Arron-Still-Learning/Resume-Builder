<?php
namespace App\Contracts\Services;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

/**
 * Interface for User Service
 */
interface UserServiceInterface
{
    /**
     * Update Profile
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(int $id, array $data): void;

    /**
     * Update Password
     *
     * @param array $data
     * @return mixed
     */
    public function updatePassword(array $data);

    /**
     * Contact
     *
     * @param array $data
     * @return void
     */
    public function contact(array $data): void;
}
