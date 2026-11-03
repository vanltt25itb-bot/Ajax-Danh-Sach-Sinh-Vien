
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'udn';

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
    die("Loi ket noi database: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8");
?>

