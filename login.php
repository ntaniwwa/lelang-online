<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body{
            background: linear-gradient(135deg, #4e73df, #c81cc8);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        .login-card{
            width: 420px;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .card-header{
            background: white;
            border: none;
            text-align: center;
            padding-top: 30px;
        }

        .card-header h3{
            font-weight: bold;
            color: #333;
        }

        .card-body{
            padding: 35px;
            background: white;
        }

        .btn-login{
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            display: block;
            text-align: center;
            text-decoration: none;
        }

        .btn-login:hover{
            transform: scale(1.03);
            text-decoration: none;
        }

        .icon-login{
            font-size: 70px;
            color: #4e73df;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="card login-card">

    <div class="card-header">
        <i class="fas fa-user-circle icon-login"></i>
        <h3>Sistem Login</h3>
        <p class="text-muted">Silahkan pilih akses login</p>
    </div>

    <div class="card-body">

        <!-- LOGIN ADMIN -->
        <a href="login-admin.php" class="btn btn-danger btn-login mb-3">
            <i class="fas fa-user-shield"></i>
            Login Administrator
        </a>

        <!-- LOGIN PETUGAS -->
        <a href="login-petugas.php" class="btn btn-primary btn-login">
            <i class="fas fa-user"></i>
            Login Petugas
        </a>

    </div>

</div>

</body>
</html>