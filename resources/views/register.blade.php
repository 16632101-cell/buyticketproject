<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครสมาชิก</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: red;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #c00;
        }
        label {
            display: block;
            margin-bottom: 5%;
            font-weight: bold;
        }
        input[type=text],
        input[type=text],
        input[type=email],
        input[type=password] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkred;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
        .login-link a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    Buyticket - สมัครสมาชิก
</header>

<div class="container">
    <h2>สมัครสมาชิก</h2>
    <form action="{{ route('register.submit') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="ชื่อ" required>
    <input type="email" name="email" placeholder="อีเมล" required>
    <input type="password" name="password" placeholder="รหัสผ่าน" required>
    <button type="submit">สมัครสมาชิก</button>
</form>
    <div class="login-link">
        มีบัญชีแล้ว? <a href="/login">เข้าสู่ระบบ</a>
    </div>
</div>

</body>
</html>
