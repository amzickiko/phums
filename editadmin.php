<?php include('conphis.php')?>
<?php
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_stmt = "DELETE FROM user_pidvola WHERE pid = '$id'";
    $deletestmt = $db->prepare($delete_stmt);
    $deletestmt ->execute();
}
?>
<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }
    if (!isset($_SESSION['username'])) {
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




            <form method="post" <main class="content">

    <div class="container-fluid p-0">
        <!--- Start import pages --->
<h1 class="h3 mb-3">อสม.</h1>

<?php
   
    include('conjhcis.php');
    $sql = "SELECT @n := @n + 1 AS 'no',pid as pid ,CONCAT(fname,' ',lname) as name from (SELECT @n := 0 ) n,
    user_pidvola WHERE role = '2'";
    $result = $db->prepare($sql);
            $result->execute();

?>

<div class="container mb-2">
<div class="row bg-light py-3">
    <div class="col text-center">
    รายชื่อ อสม.
    </div>
</div>
<div class="table-responsive-sm">
<table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-center">ลำดับ</th>
      <th scope="col">รายชื่อ</th>
      <th scope="col" class="text-center"></th>    
      <th scope="col" class="text-center"></th>    
      <th scope="col" class="text-center"></th>     
      <th scope="col" class="text-center">จัดการ</th>     
      <th scope="col" class="text-center"></th>            
    </tr>
  </thead>
  <tbody>
  <?php 
    foreach($result as $row){
  ?>
    <tr class="">
      <th scope="row" class="text-center" width="40"><?=$row['no']?></th>
      <td class="text-nowrap" ><?=$row['name'] ?></td>
      <td class="text-nowrap text-center" width="100">
      <td class="text-nowrap text-center" "></td>
      <td class="text-nowrap text-center" "></td>

      <td class="text-nowrap text-center" width="40">
            <a  href="editadmin_pidvola.php?update_id=<?=$row['pid']?>" title="แก้ไข" class="btn btn-sm btn-warning btn-confirm">แก้ไข</a>
      </td>
      <td class="text-nowrap text-center" width="40">
            <a  href="editadmin.php?delete_id=<?php echo $row['pid'];?>" data-id = "<?php echo $row['pid'];?>"
            class="btn btn-sm btn-danger " 
          
            >ลบ</a>
            
      </td>
      
      <?php 

        
    }
       
    
    ?>
    </tr>
<?php
    
    
?>
  </tbody>
</table>
</div>
 
</div> 

<script>
    $('.btn-danger').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        Swal.fire({
            title: 'คุณต้องการลบใช่หรือไม่?',
            text: "คุณจะไม่สามารถยกเลิกสิ่งนี้ได้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ใช่, ฉันต้องการลบ !'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    
                    'ลบสำเร็จ !',
                    'รายชื่อถูกลบแล้ว.',
                    'success'
                )
                setTimeout(function(){ location.href = self.attr('href');},2000)
              
            }
        })

    })

</script>
  



      <!--- End import pages --->




      <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>


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






