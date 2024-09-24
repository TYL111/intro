<?php
$mysql_server_name = '127.0.0.1:3306';
$mysql_username = 'hbfqqeecvd';
$mysql_password = 'XXCfW3yAKS';
$mysql_database = 'hbfqqeecvd';

$link = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
if($link){
    mysqli_query($link,'SET NAMES utf8');
} else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}



?>