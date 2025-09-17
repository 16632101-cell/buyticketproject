<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // แสดงฟอร์มสมัครสมาชิก
    public function showRegister()
    {
        return view('register');
    }

    // สมัครสมาชิก (เก็บใน session)
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // ดึง users ที่เก็บใน session (ถ้ามี)
        $users = Session::get('users', []);

        // เช็คว่า email ถูกใช้ไปแล้วหรือยัง
        foreach ($users as $u) {
            if ($u['email'] === $request->email) {
                return back()->with('error', 'อีเมลนี้ถูกใช้ไปแล้ว');
            }
        }

        // เพิ่ม user ใหม่ลงไป
        $users[] = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password, // ⚠️ plain text (ตัวอย่าง) ถ้าจะปลอดภัยใช้ Hash::make()
        ];

        // บันทึกกลับไปใน session
        Session::put('users', $users);

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

        $users = Session::get('users', []);

        foreach ($users as $user) {
            if ($user['email'] === $request->email && $user['password'] === $request->password) {
                // เก็บ user ลง session
                Session::put('user', $user);
                return redirect()->route('welcome')->with('success', 'เข้าสู่ระบบสำเร็จ!');
            }
        }

        return back()->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
    }

    // ออกจากระบบ
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('welcome');
    }
}