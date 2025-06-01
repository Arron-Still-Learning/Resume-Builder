<?php

namespace App\Dao;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\AdminDaointerface;
use Illuminate\Support\Facades\Storage;

class AdminDao implements AdminDaointerface
{
    /**
     * Get User list
     *
     * @return object
     */
    public function getUserlist(): object
    {
        $datas = User::when(request('search'), function ($searchKey) {
            $searchKey->where('users.name', 'like', '%' . request("search") . '%');
        })->latest('id')->paginate(5);
        $datas->appends(request()->all());
        return $datas;
    }

    /**
     * Get Admin list
     *
     * @return object
     */
    public function getAdminlist(): object
    {
        $datas = Admin::when(request('search'), function ($searchKey) {
            $searchKey->where('admins.name', 'like', '%' . request("search") . '%');
        })->latest('id')->paginate(5);
        $datas->appends(request()->all());
        return $datas;
    }

    /**
     * Admin Account Create
     *
     * @param array $data
     * @return void
     */
    public function createAdminAccount(array $data): void
    {
        Admin::create([
            "name" => $data["name"],
            "email" => $data["email"],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * User Account Create
     *
     * @param array $data
     * @return void
     */
    public function createAccount(array $data): void
    {
        User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Update Password
     *
     * @param array $data
     * @return void
     */
    public function updatePassword(array $data): void
    {
        Admin::where('id', Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($data['newPassword'])
        ]);
    }

    /**
     * Update Profile
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(int $id, array $data): void
    {
        Admin::where("id", $id)->update($data);
    }

    /**
     * Weekly User Data
     *
     * @return object
     */
    public function weeklyData(): object
    {
        return User::selectRaw('COUNT(*) as count, DAYOFWEEK(created_at) as day')
            ->groupBy('day')
            ->get();
    }

    /**
     * Weekly User Data
     *
     * @return object
     */
    public function monthlyData(): object
    {
        return User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->get();
    }

    /**
     * Admin Account Delete
     *
     * @param int $id
     * @return void
     */
    public function adminDelete(int $id): void
    {
        $admin = Admin::where('id', $id)->first();
        if ($admin) {
            $image = $admin->image;
            Storage::delete('public/profile_image/' . $image);
            $admin->delete();
        }
    }

    /**
     * User Account Delete
     *
     * @param int $id
     * @return void
     */
    public function userDelete(int $id): void
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $image = $user->image;
            Storage::delete('public/profile_image/' . $image);
            $user->delete();
        }
    }
}
