<?php
$servername = "pakmak09200.ddns.net";
$username ="root";
$port= "3333";
$password ="123456";
$dbname = "jhcisdb";
$conjhcis = mysqli_connect($servername,$username,$password,$dbname,$port);

if(!$conjhcis){
die("test am".mysqli_connect_error());

}
$conjhcis->set_charset("utf8");


?>