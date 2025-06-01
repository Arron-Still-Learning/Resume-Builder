<?php

namespace App\Services;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Contracts\Dao\UserDaoInterface;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Dao\AdminDaointerface;
use App\Contracts\Services\AdminServiceinterface;

/**
 * Student Service class
 */
class AdminService implements AdminServiceinterface
{
    /**
     * Admin Dao
     */
    public $adminDao;

    /**
     * Class Constructor
     *
     * @param AdminDaointerface
     * @return void
     */
    public function __construct(AdminDaointerface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
     * Get User List
     *
     * @return object
     */
    public function getUserlist(): object
    {
        return $this->adminDao->getUserlist();
    }

    /**
     * Get Admin List
     *
     * @return object
     */
    public function getAdminlist(): object
    {
        return $this->adminDao->getAdminlist();
    }


    /**
     * Admin Account Create
     *
     * @param array $data
     * @return void
     */
    public function createAdminAccount(array $data): void
    {
        $this->adminDao->createAdminAccount($data);
    }

    /**
     * User Account Create
     *
     * @param array $data
     * @return void
     */
    public function createAccount(array $data): void
    {
        $this->adminDao->createAccount($data);
    }

    /**
     * Update Password
     *
     * @param array $data
     * @param void
     */
    public function updatePassword(array $data): void
    {
        $oldPassword = Admin::where('id', Auth::guard('admin')->user()->id)->first()->password;
        if (Hash::check($data['oldPassword'], $oldPassword)) {
            $this->adminDao->updatePassword($data);
        }
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
        if (isset($data['image'])) {
            $oldimage = Admin::where('id', $id)->first()->image;
            if ($oldimage != null) {
                Storage::delete('public/profile_image/' . $oldimage);
            }
            $newimage = uniqid() . $data['image']->getClientOriginalName();
            $data['image']->storeAs('public/profile_image', $newimage);
            $data['image'] = $newimage;
        }
        $this->adminDao->update($id, $data);
    }

    /**
     * Weekly User Data
     *
     * @return object
     */
    public function weeklyData(): object
    {
        return $this->adminDao->weeklyData();
    }

    /**
     * Weekly User Data
     *
     * @return object
     */
    public function monthlyData(): object
    {
        return $this->adminDao->monthlyData();
    }

    /**
     * Admin Account Delete
     *
     * @param int $id
     * @return void
     */
    public function adminDelete(int $id): void
    {
        $this->adminDao->adminDelete($id);
    }

    /**
     * User Account Delete
     *
     * @param int $id
     * @return void
     */
    public function userDelete(int $id): void
    {
        $this->adminDao->userDelete($id);
    }
}
