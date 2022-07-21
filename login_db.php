
<?php 

session_start();
require_once 'conphis.php';

?>
<?php 
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

  
    if (empty($username )) {
        $_SESSION['error'] = "เข้าสู่ระบบไม่สำเร็จ! ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
        header("location: login.php");
    } else  if (empty($password)) {
        $_SESSION['error'] = "เข้าสู่ระบบไม่สำเร็จ! ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
        header("location: login.php");
    } else  {
        try {

            $sqllogin = "select * from user_pidvola where username = '$username' and password = '$password'";
            $result = $db->prepare($sqllogin);
            $result->execute();
            
            $usercheck = $result->rowCount();
            $row =  $result->fetch(PDO::FETCH_ASSOC);
            
            if(!isset($_POST['username'])||!isset($_POST['password'])){
                $_SESSION['error'] = "เข้าสู่ระบบไม่สำเร็จ! ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
                        header("location: login.php"); 
            }else if($usercheck == 1){
            
                if ($row['role'] == '1') {
                    $_SESSION['username'] = $username;
                    $_SESSION['pid'] = $row['pid'];
                    $_SESSION['role'] = $row['role'];
                    header("location: admin.php");
                } 
                if ($row['role'] == '2') {
                    $_SESSION['username'] = $username;
                    $_SESSION['pid'] = $row['pid'];
                    $_SESSION['role'] = $row['role'];
                    header("location: index.php");
                } 
            
            
            }else{
                $_SESSION['error'] = "เข้าสู่ระบบไม่สำเร็จ! ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
                        header("location: login.php");      
            }
            


        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>