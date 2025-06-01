<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface UserDaoInterface
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
     * @return void
     */
    public function updatePassword(array $data): void;
}
