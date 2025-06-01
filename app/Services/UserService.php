<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\UserDaoInterface;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Services\UserServiceInterface;

/**
 * Student Service class
 */
class UserService implements UserServiceInterface
{
    /**
     * User Dao
     */
    public $userDao;

    /**
     * Class Constructor
     *
     * @param UserDaointerface
     * @return void
     */
    public function __construct(UserDaoInterface $UserDao)
    {
        $this->userDao = $UserDao;
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
        if (isset($data['image']))
        {
            $oldimage = User::where('id',$id)->first()->image;
            if ($oldimage != null)
            {
                Storage::delete('public/profile_image/'. $oldimage);
            }
            $newimage = uniqid() . $data['image']->getClientOriginalName();
            $data['image']->storeAs('public/profile_image', $newimage);
            $data['image'] = $newimage;
        }
        $this->userDao->update($id, $data);
    }

    /**
     * Update Password
     *
     * @param array $data
     * @return mixed
     */
    public function updatePassword(array $data)
    {
        $oldPassword = User::where('id', Auth::user()->id)->first()->password;
        if (Hash::check($data['oldPassword'], $oldPassword))
        {
            $this->userDao->updatePassword($data);
        }
    }

    /**
     * Conatct
     *
     * @param array $data
     * @return void
     */
    public function contact(array $data): void
    {
        Mail::send('user/contactmail', ['data' => $data], function($message) use ($data)
        {
            $message->from($data['mail']);
            $message->to('hello@example.com');
            $message->subject($data['subject']);
        });
    }
}
