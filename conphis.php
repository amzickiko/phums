



<?php 

$hostname = "pakmak09200.ddns.net";
$username = "root";
    $port= "3333";
    $password = "123456";
    $dbname = "phisdb";
    $charset="utf8";

    try {

                    //connect ฐานข้อมูล 
                    $db = new PDO("mysql:host=$hostname;port=$port;dbname=$dbname;", $username, $password,array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset",));
                            $db->setAttribute(PDO::ATTR_TIMEOUT,5);   
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $conn_status='true';
                        
                    }
                    catch (Exception $e){
                            $conn_status='false';
                            
                    }      
                    ?>