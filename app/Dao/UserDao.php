<?php

namespace App\Dao;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    /**
     * Update Profile
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(int $id, array $data): void
    {
        User::where("id", $id)->update($data);
    }

    /**
     * Update Password
     *
     * @param array $data
     * @return void
     */
    public function updatePassword(array $data): void
    {
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($data['newPassword'])
            ]);
    }
}
