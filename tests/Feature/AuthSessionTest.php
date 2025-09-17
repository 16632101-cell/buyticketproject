<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthSessionTest extends TestCase
{
    public function test_register_and_login_with_session()
    {
        // สมัครสมาชิก
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123456',
        ]);

        $response->assertRedirect('/login');

        // ล็อกอิน
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '123456',
        ]);

        $response->assertRedirect('/'); // ไปหน้า welcome
        $this->assertTrue(session()->has('user'));
        $this->assertEquals('Test User', session('user.name'));
    }

    public function test_login_with_wrong_password_fails()
    {
        // สมัครสมาชิกก่อน
        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123456',
        ]);

        // ล็อกอินผิดพลาด
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpass',
        ]);

        $response->assertSessionHas('error');
    }

    public function test_logout_clears_session()
    {
        // สมัครและล็อกอินก่อน
        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123456',
        ]);
        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '123456',
        ]);

        // ออกจากระบบ
        $response = $this->get('/logout');

        $response->assertRedirect('/');
        $this->assertFalse(session()->has('user'));
    }
}
