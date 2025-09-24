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
            background-color: #fafafa;
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
        .login-btn, .logout-btn, .detail-btn {
            background-color: #c00;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
        }
        .login-btn:hover, .logout-btn:hover, .detail-btn:hover {
            background-color: #900;
        }
        /* ---- Gallery ---- */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }
        .gallery-item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            text-align: center;
            padding-bottom: 15px;
        }
        .gallery-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .gallery-item h3 {
            font-size: 16px;
            margin: 10px 0;
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
                <button type="submit" class="logout-btn">ออกจากระบบ</button>
            </form>
        </div>
    @else
        <a href="/login" class="login-btn">เข้าสู่ระบบ</a>
    @endif
</header>

<!-- Gallery Section -->
<section class="gallery">
    <div class="gallery-item">
        <img src="https://picsum.photos/id/1011/400/250" alt="event1">
        <h3>คอนเสิร์ต A</h3>
        <a href="#" class="detail-btn">รายละเอียด</a>
    </div>
    <div class="gallery-item">
        <img src="https://picsum.photos/id/1012/400/250" alt="event2">
        <h3>คอนเสิร์ต B</h3>
        <a href="#" class="detail-btn">รายละเอียด</a>
    </div>
    <div class="gallery-item">
        <img src="https://picsum.photos/id/1015/400/250" alt="event3">
        <h3>คอนเสิร์ต C</h3>
        <a href="#" class="detail-btn">รายละเอียด</a>
    </div>
    <div class="gallery-item">
        <img src="https://picsum.photos/id/1016/400/250" alt="event4">
        <h3>คอนเสิร์ต D</h3>
        <a href="#" class="detail-btn">รายละเอียด</a>
    </div>
    <div class="gallery-item">
        <img src="https://picsum.photos/id/1025/400/250" alt="event5">
        <h3>คอนเสิร์ต E</h3>
        <a href="#" class="detail-btn">รายละเอียด</a>
    </div>
    <div class="gallery-item">
        <img src="https://picsum.photos/id/1031/400/250" alt="event6">
        <h3>คอนเสิร์ต F</h3>
        <a href="#" class="detail-btn">รายละเอียด</a>
    </div>
</section>

</body>
</html>
