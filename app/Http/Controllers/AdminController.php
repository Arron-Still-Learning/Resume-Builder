<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Contracts\Services\AdminServiceinterface;

class AdminController extends Controller
{
    /**
     * Admin Interface
     */
    private $adminService;

    /**
     * Create new Controller instance
     *
     * @param AdminServiceinterface $adminService
     */
    public function __construct(AdminServiceinterface $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Admin Login Page
     *
     * @return view Admin Login Page
     */
    public function loginPage()
    {
        return view('admin.login');
    }

    /**
     * Login
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request): mixed
    {
        $input_data = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($input_data) {
            return redirect()->route('admin.weekly.chart');
        }
        return redirect()->back()->withErrors(['email' => 'Email is wrong', 'password' => 'Password is wrong']);
    }

    /**
     * Logout
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    /**
     * Admin Home Page
     *
     * @return view Admin page
     */
    public function userList()
    {
        $datas = $this->adminService->getUserlist();
        return view('admin.userList', compact('datas'));
    }

    /**
     * Admin List Page
     *
     * @return view Admin page
     */
    public function adminList()
    {
        $datas = $this->adminService->getAdminlist();
        return view('admin.adminList', compact('datas'));
    }

    /**
     * Admin Account Create Page
     *
     * @return view Account Create Page
     */
    public function adminAccountCreate()
    {
        return view('admin.admincreate');
    }

    /**
     * Admin Account Create
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAdminAccount(RegisterRequest $request): RedirectResponse
    {
        $this->adminService->createAdminAccount($request->only([
            'name',
            'email',
            'password'
        ]));
        return redirect()->route('admin.adminList');
    }

    /**
     * User Account Create Page
     *
     * @return view Account Create Page
     */
    public function accountCreate()
    {
        return view('admin.usercreate');
    }

    /**
     * User Account Create
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createAccount(RegisterRequest $request)
    {
        $this->adminService->createAccount($request->only([
            'name',
            'email',
            'password'
        ]));
        return redirect()->route('admin.userList');
    }

    /**
     * Admin Update Password Page
     *
     * @return view Admin Update Password Page
     */
    public function password()
    {
        return view('admin.updatepassword');
    }

    /**
     * Update Password
     *
     * @param \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $this->adminService->updatePassword($request->all());
        return redirect()->route('admin.weekly.chart');
    }

    /**
     * Admin Profile Page
     *
     * @return view Admin Profile Page
     */
    public function adminProfile(): View
    {
        return view('admin.profile');
    }

    /**
     * Admin Profile Update
     *
     * @param int $id
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminProfileUpdate(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $this->adminService->update($id, $request->only([
            'name',
            'email',
            'image'
        ]));
        return redirect()->route('admin.weekly.chart');
    }

    /**
     * Weekly Chart Page
     *
     * @return view Weekly Chart Page
     */
    public function weeklychart(): View
    {
        return view('admin.weeklychart');
    }

    /**
     * Weekly Chart Data
     *
     * @return Response
     */
    public function weeklychartdata()
    {
        $weeklyData = $this->adminService->weeklyData();
        return response()->json($weeklyData);
    }

    /**
     * Monthly Chart Page
     *
     * @return view Monthly Chart Page
     */
    public function monthlychart(): View
    {
        return view('admin.monthlychart');
    }

    /**
     * Weekly Chart Data
     *
     * @return Response
     */
    public function monthlychartdata()
    {
        $monthlyData = $this->adminService->monthlyData();
        return response()->json($monthlyData);
    }

    /**
     * Admin Account Delete
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminDelete($id): RedirectResponse
    {
        $this->adminService->adminDelete($id);
        return redirect()->route('admin.adminList')->with(['success' => 'Delete Success']);
    }

    /**
     * User Account Delete
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userDelete($id): RedirectResponse
    {
        $this->adminService->userDelete($id);
        return redirect()->route('admin.userList')->with(['success' => 'Delete Success']);
    }
}
