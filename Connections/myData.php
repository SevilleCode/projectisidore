<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myData = "localhost";
$database_myData = "";
$username_myData = "";
$password_myData = "";
$myData = new mysqli($hostname_myData, $username_myData, $password_myData, $database_myData) or trigger_error(mysqli_connect_error(),E_USER_ERROR);
?>