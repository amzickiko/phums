<?php
session_start();
require_once 'conphis.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>โรงพยาบาลส่งเสริมสุขภาพตำบลปากหมาก</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/butterCake.min.css">
  <link rel="stylesheet" href="css/stylelogin.css">
  <link rel="shortcut icon" href="img/logomanu.png" />
</head>
<body>
<!-- LOGIN CONTAINER -->
<section class="login-page flex-center-center py-5 bg-light">
  <!-- FORM -->
  <div class="w-100 mx-auto px-2" style="max-width: 400px">
  <form action="login_db.php" method="post">
      <div class="text-center text-gray">
        <h2 class="main">เข้าสู่ระบบสำหรับ อสม.</h2>
        <p class="submain">กรุณากรอกชื่อเข้าใช้งานและรหัสผ่าน เพื่อเข้าสู่ระบบจัดการข้อมูล</p>
      </div>
      <div class="card overflow-unset mt-9 mb-1">
        <div class="card-body">
          <div class="avatar-icon text-center">
            <img src="img/logo.png" alt="Avatar"
              class="img-circle img-cover card mb-2 ml-auto mr-auto p-1">
          </div>
          <div class="group">
            <input type="text"  name ="username" class="input" placeholder="กรอกชื่อผู้ใช้งาน">
          </div>
          <!-- PASSWORD -->
          <div class="group">
            <input type="password" name="password" class="input" placeholder="กรอกรหัสผ่าน">
          </div>
          <!-- LOGIN -->
          <div class="button">
            <button class="btn btn-light btn-lg btn-block" name = "login_user" >เข้าสู่ระบบ</button>
          </div>
        </div>
      </div>
      <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h7>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h7>
            </div>
        <?php endif ?>
    </form>
  </div>
</section>
<!-- STYLE -->
<style>
  .login-page {
    min-height: 100vh;
  }
  .login-page .avatar-icon img {
    margin-top: -80px;
    width: 128px;
    height: 128px;
  }
</style>
  
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/butterCake.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>
</html>