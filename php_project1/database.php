<?php
$conn = mysqli_connect("localhost", "root", "", "php_project1", 3306);
if(mysqli_connect_error()):
    $error = "Mysql error: ".mysqli_connect_error();
    die($error);
endif;

$query = "select * from contacts";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)):
    print_r($row);
endwhile;
?>
