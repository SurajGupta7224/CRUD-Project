<?php
$server ="localhost";
    $username="root";
    $password ="";
    $database ="notes";
    $conn = mysqli_connect($server,$username,$password,$database);
    if(!$conn){
        echo "server not is connect";
    }
    ?>