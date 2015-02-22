<?php
$host = "23.254.128.69";
$user = "root";
$pass = "123456";
$dbname = "mydatabase";
// connect mySQL
$conn= mysql_connect($host, $user,$pass);
if (!$conn) {
echo nl2br("Connection failed\n");
trigger_error(mysql_error(), E_USER_ERROR);
} else {
echo nl2br("Connection established\n");
}
// connect database
$db = mysql_select_db($dbname);
if (!$db) {
echo nl2br("Database connection failed: $db\n");
trigger_error(mysql_error(), E_USER_ERROR);
} else {
echo nl2br("Database connected\n");
}
?>