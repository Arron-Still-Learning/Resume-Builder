<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Contracts\Services\UserServiceInterface;

class UserController extends Controller
{
    /**
     * User Interface
     */
    private $userService;

    /**
     * Create new Controller instance
     *
     * @param UserServiceInterface $UserServiceinterface
     */
    public function __construct(UserServiceInterface $UserServiceinterface)
    {
        $this->userService = $UserServiceinterface;
    }


    /**
     * User Home Page
     *
     * @return view User page
     *
     */
    public function list(): View
    {
        return view('welcome');
    }

    /**
     * User Profile Page
     *
     * @return view User Profile Page
     */
    public function profile(): View
    {
        return view('user.profile');
    }

    /**
     * User Profile Update
     *
     * @param int $id
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $this->userService->update($id, $request->only([
            'name',
            'email',
            'image'
        ]));
        return redirect()->route('user.list');
    }

    /**
     * User Update Password Page
     *
     * @return view User Update Password Page
     */
    public function password(): View
    {
        return view('user.updatepassword');
    }

    /**
     * Update Password
     *
     * @param \App\Http\Requests\UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->userService->updatePassword($request->all());
        return redirect()->route('user.list');
    }

    /**
     * Contact Us Page
     *
     * @return view Contact Us Page
     */
    public function contactUs(): View
    {
        return view('user.contact');
    }

    /**
     * Contact Us
     *
     * @param \App\Http\Requests\ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(ContactRequest $request): RedirectResponse
    {
        $this->userService->contact($request->all());
        return redirect()->back()->with(['success' => 'Mail Send Success']);
    }
}
