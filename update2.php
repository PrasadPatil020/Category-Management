<?php
session_start();
if (($_SESSION['email'] == '') ){ 
   header("Location: index.php");
}
 include 'conn.php';

 if(isset($_POST['done'])){
//for photos
  $fileName1 = $_FILES['photos']['name'];
  $tempName1 = $_FILES['photos']['tmp_name'];
    
  if(isset($fileName1))
     {
       if(!empty($fileName1))
       {
             $location1 = "img/";
             if(move_uploaded_file($tempName1, $location1.$fileName1))
             {
                  header("Location:display2.php");
        
           }
        }
  }
 //for images
  $fileName2 = $_FILES['image']['name'];
  $tempName2 = $_FILES['image']['tmp_name'];
    
  if(isset($fileName2))
     {
       if(!empty($fileName2))
       {
             $location2 = "img/";
             if(move_uploaded_file($tempName2, $location2.$fileName2))
             {
                  header("Location:display2.php");
        
           }
        }
  }

 $id=$_GET['id'];
 $name = $_POST['name'];
 $description = $_POST['description'];
 $price = $_POST['price'];


 $q = " update insertpm set name='$name',description='$description',price='$price', photos = '$fileName1', image= '$fileName2' where id=$id  ";

 $query = mysqli_query($conn,$q);

 header('location:display2.php');
 }
?>
<?php
if(isset($_POST['done'])){

// if in present id (photos is empty then fill photos with current filename)
$curr_fileName1 = $_POST['current_photos'];
$curr_fileName2 = $_POST['current_image'];
$eid = $_POST['id'];
$q = "update insertpm set  photos = '$curr_fileName1', image= '$curr_fileName2' where id='$eid' and photos='' and image = '' ";
$query = mysqli_query($conn,$q);
 header('location:display2.php');
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
 $q ="select * from insertpm where id=$id";


 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
	 
	 ?>
 <form  method="post" enctype="multipart/form-data">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center"> Update Product Management</h1>
 </div><br>

 <label> Name</label>
 <input required placeholder="Enter your Name" type="text" name="name"  value="<?php echo $res['name'] ?>" class="form-control"> <br>
 
  <label>Description</label>
 <input required placeholder="Enter Description"  type="text" name="description"  value="<?php echo $res['description'] ?>" class="form-control"> <br>

 <label>Price</label>
 <input required placeholder="Enter Price"  type="text" name="price"  value="<?php echo $res['price'] ?>" class="form-control"> <br>

  <label>Photos</label>
  <input type="hidden" name="id" value="<?php echo $res['id'];?>">
  <input type="hidden" name="current_photos" value="<?php echo $res['photos'];?>">
  <input type="file" name="photos" multiple class="form-control" value="<?php echo $res['photos'];?>" class="form-control"><br>

<label>Image</label>
  <input type="hidden" name="id" value="<?php echo $res['id'];?>">
  <input type="hidden" name="current_image" value="<?php echo $res['image'];?>">
  <input type="file" name="image" multiple class="form-control" value="<?php echo $res['image'];?>" class="form-control"><br>

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