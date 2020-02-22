<?php
session_start();
if (($_SESSION['email'] == '') ){ 
   header("Location: index.php");
}
 include 'conn.php';

 if(isset($_POST['done'])){

 $id=$_GET['id'];
 $name = $_POST['name'];

 $q = " update insertcm set name='$name' where id=$id  ";

 $query = mysqli_query($conn,$q);

 header('location:display1.php');
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
 <?php
 $id = $_GET['id'];
 $q ="select * from insertcm where id=$id";


 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
	 
	 ?>
 <form  method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center"> Update Product Category Management </h1>
 </div><br>

 <label> Name</label>
 <input required placeholder="Enter your Name" type="text" name="name"  value="<?php echo $res['name'] ?>" class="form-control"> <br>
 
 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 <?php } ?>
 </div>
 </form>
 </div>
</body>
</html>



<?php
include 'includes/footer.php';
?>