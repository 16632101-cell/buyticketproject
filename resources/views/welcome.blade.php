<?php ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Buyticket</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #c00;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }
        nav ul li {
            display: inline;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-info {
            background-color: red;
            color: white;
            padding: 8px 14px;
            border-radius: 4px;
            font-weight: bold;
        }
        .logout-btn {
            background-color: #555;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .logout-btn:hover {
            background-color: #333;
        }
        .banner {
            background-color: #900;
            color: white;
            padding: 40px;
            text-align: center;
        }
        .banner h1 {
            font-size: 40px;
            margin: 0;
        }
        .banner p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Buyticket</div>
    <nav>
        <ul>
            <li><a href="#">หน้าแรก</a></li>
            <li><a href="{{ route('show') }}">ทุกงานแสดง</a></li>
            <li><a href="#">สินค้าที่ระลึก</a></li>
            <li><a href="#">วาไรตี้</a></li>
            <li><a href="#">โปรโมชั่น</a></li>
        </ul>
    </nav>

    @if(session()->has('user'))
        <div style="display:flex;align-items:center;gap:10px;">
            <span>👤 {{ session('user.name') }}</span>
            <form action="{{ route('logout') }}" method="GET">
                <button type="submit" class="login-btn">ออกจากระบบ</button>
            </form>
        </div>
    @else
        <a href="/login" class="login-btn">เข้าสู่ระบบ</a>
    @endif
</header>


<section class="banner">
    <h1>*เวอร์ชั่นทดสอบ*</h1>
    <p>เวอร์ชั่นทดสอบ</p>
    <p>เวอร์ชั่นทดสอบ</p>
</section>

<div style="text-align: center;">
    <img src="https://media1.tenor.com/m/TKaLVjpWD8IAAAAd/miyabi-hoshimi-miyabi.gif" alt="รูปภาพ" width="30%">
</div>

</body>
</html>