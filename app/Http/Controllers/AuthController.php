<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use App\Models\Candidate;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        // tìm role
        $role = Role::where('role_name', $request->role)->first();

        if (!$role) {
            return back()->with('error', 'Role không tồn tại');
        }

        // tạo account
        $account = Account::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->role_id
        ]);

        // tạo profile tương ứng
        if ($request->role == 'CANDIDATE') {
            Candidate::create([
                'account_id' => $account->account_id
            ]);
        } elseif ($request->role == 'EMPLOYER') {
            Employer::create([
                'account_id' => $account->account_id
            ]);
        }

        return redirect('/login')->with('success', 'Đăng ký thành công');
    }

    // ================= LOGIN =================
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $role = $user->role->role_name;

            // phân quyền
            if ($role == 'ADMIN') {
                return redirect('/admin');
            } elseif ($role == 'EMPLOYER') {
                return redirect('/employer');
            } else {
                return redirect('/candidate');
            }
        }

        return back()->with('error', 'Sai email hoặc mật khẩu');
    }

    // ================= LOGOUT =================
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}