<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // แสดงฟอร์มสมัครสมาชิก
    public function showRegister()
    {
        return view('register');
    }

    // สมัครสมาชิก
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'สมัครสมาชิกสำเร็จ! กรุณาเข้าสู่ระบบ');
    }

    // แสดงฟอร์มล็อกอิน
    public function showLogin()
    {
        return view('login');
    }

    // ตรวจสอบการเข้าสู่ระบบ
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // เก็บ user ไว้ใน session
            Session::put('user', $user);

            return redirect()->route('welcome')->with('success', 'เข้าสู่ระบบสำเร็จ!');
        }

        return back()->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง หรือไม่มีสมาชิกในระบบ');
    }

    // ออกจากระบบ
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('welcome');
    }
}
