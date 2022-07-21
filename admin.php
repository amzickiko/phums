<?php include('conphis.php')?>
<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    if ($_SESSION['role'] == '2') {
                    
        header("Location: login.php");
    }
        


?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ระบบจัดการข้อมูลประชากรโดย อสม.">
    <meta name="author" content="Amzickiko">
    <meta name="keywords" content="pakmak,chaiya,suratthani">
    <link rel="shortcut icon" href="img/logomanu.png" />
    <title>โรงพยาบาลส่งเสริมสุขภาพตำบลปากหมาก</title>
    <link rel="stylesheet" href="bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="css/stylemain.css" rel="stylesheet">
    <link href="template/dist/css/style.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet" />
 






</head>

<body>

    <div class="wrapper">
                <nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <div class="sidebar-brand text-center">
            <span class="align-middle"><img src="img/logomanu.png" alt="" width="150px"></span>
            <span>Admin</span>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                HOME
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="admin.php">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">หน้าแรก</span>
                </a>
            </li>
           
            <li class="sidebar-item ">
            <a class="sidebar-link" href="editadmin.php">
                    <i class="align-middle" data-feather="users"></i> <span
                        class="align-middle">อสม.</span>
                </a>
            </li>
            <li class="sidebar-header">
                ระบบข้อมูล
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="admin.php">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">ตรวจสอบข้อมูล</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="admin.php">
                    <i class="align-middle" data-feather="upload-cloud"></i> <span class="align-middle">นำเข้า JHCIS</span>
                </a>
            </li>
           
            <li class="sidebar-item ">
            <a class="sidebar-link" href="admin.php">
                    <i class="align-middle" data-feather="layers"></i> <span
                        class="align-middle">รายงานข้อมูลคัดกรอง</span>
                </a>
            </li>
           

          
            <li class="sidebar-header">
                System Setting
            </li>
<!--
            <li class="sidebar-item ">
                <a class="sidebar-link" href="index.php?url=pages/line-config.php">
                    <i class="align-middle" data-feather="message-circle"></i> <span
                        class="align-middle">ตั้งค่าแจ้งเตือนทาง Line</span>
                </a>
            </li>
-->
            <li class="sidebar-item ">


            

                <a class="sidebar-link" href="index.php?logout='1'">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">ออกจากระบบ</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>
               

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                     
                    
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#!"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#!"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?logout='1'">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>            <!-- Pre-loader start -->




<main class="content">

    <div class="container-fluid p-0">
        <!--- Start import pages --->
<h4>HOME</h4>


      <!--- End import pages --->

    </div>
</main>            <footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-left">
                <p class="mb-0">
                <a href="index.php" class="text-muted"><strong>Pakmak Hospital Information System</strong></a> &copy; 2022
                </p>
            </div>
         
        </div>
    </div>
</footer>
        </div>
    </div>
<script src="js/custom.min.js"></script> 
<script src="js/app.js"></script>
<script src="js/bootbox.js"></script>
<script src="js/canvas.js"></script>
<script src="js/jquery-3.5.1.js"></script>   


    

</body>

</html>






