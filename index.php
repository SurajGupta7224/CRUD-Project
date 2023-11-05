<?php
 
   $error = false;
   $error1 = false;
   include('connection.php');

    if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $description = $_POST['description'];
      if($title == ""){
        $error = true;
      }elseif($description == ""){
        $error1 = true;
      }
      else{

      $sql ="INSERT INTO `addnote` ( `title`, `description`) VALUES ('$title', '$description')";
      $result = mysqli_query($conn,$sql);
   
        if(!$result){
          echo "";
        }
        else{
          
        }
      
      }

    }


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NOTES</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
</head>

<body>
  <!-- this is navbar section -->


  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="img\logo.jpg" height="40px" /> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Serivices </a>
          </li>
        </ul>





      </div>
    </div>
  </nav>



  <!-- end navbar section -->


  <?php
if($error)
{
  echo "<div class='alert alert-success' role='alert'>
  Please enter the your title !
</div>";
}elseif($error1)
{
  echo "<div class='alert alert-success' role='alert'>
  Please enter the  Description  !
</div>";
}
?>

  <!-- start from  section -->

  <div class="container my-5">

    <form action="index.php" method="POST">
      <h2>Add a Note </h2>
      <div class="mb-4">
        <label for="exampleInputEmail1" class="form-label">Note Title</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Note Description</label>
        <textarea class="form-control" name="description" placeholder="Leave a Description here" id="floatingTextarea2"
          style="height: 100px"></textarea>

      </div>

      <button type="submit" class="btn btn-primary" name="submit">Add Note</button>
    </form>

  </div>


  <!-- end from  section -->


  <!-- strat table -->
  <div class="container ">
    <table class="table" border="1" id="example">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
    $sql = "SELECT * FROM `addnote`";
   $result1 = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($result1)){
    echo " <tr>
    <th scope='row'>".$row['srn']."</th>
    <td>".$row['title']."</td>
    <td>".$row['description']."</td>
    <td><button class='btn btn-primary'><a href='editpage.php?id=$row[srn]' class='text-decoration-none text-white'>Edit</a></button> <button class='btn btn-danger'><a href='deletepage.php?id=$row[srn]' class='text-decoration-none text-white' onclick=' return checkdelete()'>Delete</a></button></td>
  </tr>";
  
 
    }   
   ?>


      </tbody>
    </table>
  </div>
  <!-- end table -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script>
    function checkdelete() {
      return confirm(' Are you sure your want to delete this record ?');
    }
  </script>
</body>

</html>