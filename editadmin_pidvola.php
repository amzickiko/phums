<?php require_once 'conphis.php'; ?>
<?php 
    session_start();
    $pid_vola = $_GET['update_id'];
    echo '<script src="js/jquery-3.6.0.js"></script>

    <script src="js/sweetalert-dev.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.min.css">';
  
    if (isset($_POST['save'])) {
        $db_username = $_POST['username-vola'];
        $db_password = $_POST['password'];
        $sqlcheck = "select username from user_pidvola where username = '$db_username '";
        $result = $db->prepare($sqlcheck);
        $result->execute(); 
        $usercheck = $result->rowCount();
        $row =  $result->fetch(PDO::FETCH_ASSOC);

       
        if($usercheck == 1){

            echo "<script> setTimeout (function(){
                Swal.fire({
                    title: 'บันทึกไม่สำเร็จ',
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'ตกลง'
                })
            },100)</script>";
    
        
        }else{

            $sql_register = "update user_pidvola set 
            username='$db_username',
            password='$db_password'
            where pid ='$pid_vola'";
            $register_db = $db->query($sql_register, PDO::FETCH_OBJ);
            echo "<script> setTimeout (function(){
                Swal.fire({
                    title: 'บันทึกสำเร็จ',
                    icon: 'success',
                 
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ตกลง'
                })
            },100)</script>";
    
    
    
}
       
    }
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
   
    $sql_person = "select user_pidvola.*,concat(fname,' ',lname) as name from user_pidvola where pid ='$pid_vola'";
    $person_detail = $db->query($sql_person, PDO::FETCH_OBJ);
    foreach ($person_detail as $person) { 
        $pid = $person->pid;
        $username = $person->username;
        $password= $person->password;
        $fname = $person->fname;
        $lname = $person->lname;
        $name = $person->name;
        
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
 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>





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

            <li class="sidebar-item ">
                <a class="sidebar-link" href="admin.php">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">หน้าแรก</span>
                </a>
            </li>
           
            <li class="sidebar-item active">
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




            <form method="post"  class="content">

    <div class="container-fluid p-0">
        <!--- Start import pages --->




<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
                <div class="card-body">
                    <h4 class="bold">แก้ไขข้อมูล อสม.</h4>
                    <h5 class="text-muted">แก้ไข ชื่อ - สกุล /ชื่อผู้ใช้งาน และรหัสผ่าน </h5>
                    <br>
                    <!-- <div name="loading" id="loading" class="text-center" style="display:none;text-align:center;">
                        <img src="./img/loading/loading6.gif" width="120px;">
                    </div>-->
                    <h4 class="bold">ส่วนที่ 1 ข้อมูลส่วนบุคคล</h4>
                    <hr />
                    <div class="mb-3 row">

                  

                        <div class="col-md-4 row">
                            <label class="col-form-label col-sm-3 text-sm-left" for="cid">HN</label>
                            <div class="col-sm-9">
                           
                                <input type="text" id="HN" name="HN" class="form-control"
                                    placeholder="HN" value="<?=$person->pid;?>">
                            </div>
                        </div>
                        <div class="col-md-4 row">
                            <label class="col-form-label col-sm-3 text-sm-left" for="fullname">ชื่อ-สกุล</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="ชื่อ - สกุล" value="<?=$person->name?>">
                            </div>
                        </div>
                     
                     
                    </div>

                    <h4 class="bold">ส่วนที่ 2 ชื่อผู้ใช้งานและรหัสผ่าน</h4>
                    <hr />
                    <div class="mb-3 row">
                    <div class="col-md-4 row">                     
                        <label class="col-form-label col-sm-3 text-sm-left">ชื่อผู้ใช้</label>
                        <div class="col-sm-9">
                            <input type="text" id="username-vola" name="username-vola" class="form-control" placeholder="ชื่อผู้ใช้งาน"
                            value="<?=$person->username?>">
                        </div>


                    </div>
                    <div class="col-md-4 row">                    
              
                        <label class="col-form-label col-sm-3 text-sm-left"for="telphone">รหัสผ่าน</label>
                        <div class="col-sm-9">
                            <input type="text" id="password" name="password" class="form-control" placeholder="รหัสผ่าน"
                            value="<?=$person->password?>">
                        </div>


                    </div>
                    
                    <h4 class="bold"></h4>
                    <h4 class="bold"></h4>
                    <h4 class="bold"></h4>
                    <h4 class="bold"></h4>
                    
                    <div class="col-sm-9">
                    <label class="col-form-label col-sm-3 text-sm-left"for="telphone"></label>
                        </div>
                    <div class="col-md-2 row right">                    
                        <button   class="btn btn-info" name="save"><i class="far " ></i>
                            บันทึก</button>
                    </div>

                </div>
             
                
        



        </div>
    </div>

</div>


</form>


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






