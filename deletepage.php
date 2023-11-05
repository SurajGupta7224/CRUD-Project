<?php
include('connection.php');
$id = $_GET['id'];
$sql ="DELETE FROM addnote WHERE `addnote`.`srn` = '$id'"; 
$result = mysqli_query($conn,$sql);
if($result){
   
    ?>
    <meta http-equiv = "refresh" content ="0; url= http://localhost/crud%20project/index.php"/>
    <?php
}
?>