
<?php
include('connection.php');
$id = $_GET['id'];
$sql = "SELECT * FROM `addnote` where srn = $id";
$result1 = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result1);
 
if(isset($_POST['update'])){
  $title = $_POST['title'];
  $Description = $_POST['description'];
  $sql ="UPDATE `addnote` SET `title` = '$title', `description` = '$Description' WHERE `addnote`.`srn` = $id";
  $result = mysqli_query($conn,  $sql);
   if(!$result){
    echo "data is not updated ";
   }
   else{
    echo "<script>alert('Data is successfully updated')</script>";
    ?>
    <meta http-equiv = "refresh" content ="0; url= http://localhost/crud%20project/index.php"/>

    <?php
  }
 }


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    
    <form  method="POST">
      <h2>Edit a Note </h2>
      <div class="mb-4">
        <label for="exampleInputEmail1" class="form-label">Note Title</label>
        <input type="text" value="<?php echo $row['title']; ?>"name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Note Description</label>
        <textarea class="form-control" name="description" placeholder="Leave a Description here" id="floatingTextarea2"
          style="height: 100px"><?php  echo  $row['description']; ?></textarea>

      </div>

      <button type="submit" class="btn btn-primary" name="update">EDIT NOW</button>
      
      <button type="submit" class="btn btn-primary " ><a href="index.php" class="text-decoration-none text-white">Back </a></button>
  
    </form>
  
  </div>
</body>
</html>