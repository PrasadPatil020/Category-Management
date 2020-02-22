<?php
session_start();
include 'conn.php';

if (($_SESSION['email'] != 'admin@admin.com') )
{
 header("Location:index.php");
}
 
 // date_default_timezone_set('Asia/Calcutta'); 

if(isset($_POST['done'])){
  
   $name   = $_POST['name']; 
  
 $q = "INSERT INTO insertcm"."(name)"."VALUES"."( '$name')";
 
 $result=$conn->query($q);

  if ($result==true) 
  {
    # code...
header("location:display1.php");
  }
  else
  {
    echo "Error".$q."<br>".$conn->error;
  }
  $conn->close();
  }
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<?php 
include 'includes/header.php';
include 'includes/navbar.php';

?>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post" enctype="multipart/form-data">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h4 class="text-white text-center">Product Category Management</h4>
 </div><br>
 
   <label>Name</label>
 <input required placeholder="Enter Name" type="text" name="name"  class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
<?php
include 'includes/footer.php';
?>