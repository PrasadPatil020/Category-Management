<?php
session_start();
include 'conn.php';

if (($_SESSION['email'] != 'admin@admin.com') )
{
 header("Location:index.php");
}
 
 // date_default_timezone_set('Asia/Calcutta'); 

if(isset($_POST['done'])){
//for photos
  $fileName1 = $_FILES['fileName1']['name'];
  $tempName1 = $_FILES['fileName1']['tmp_name'];
    
  if(isset($fileName1))
     {
       if(!empty($fileName1))
       {
             $location1 = "img/";
             if(move_uploaded_file($tempName2, $location1.$fileName1))
             {
                  header("Location:display2.php");
				
           }
        }
  }
 //for images
  $fileName2 = $_FILES['fileName2']['name'];
  $tempName2 = $_FILES['fileName2']['tmp_name'];
    
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

   $name   = $_POST['name']; 
   $description  = $_POST['description'];
   $price = $_POST['price'];
  
 $q = "INSERT INTO insertpm"."(name,description,price,photos,image)"."VALUES"."( '$name','$description', '$price','$fileName1','$fileName2')";
 

//  $query = mysqli_query($con,$q);
//  if($query)
//  {
//   header("location:display.php");
//  // redirect("display.php");
//  }
//  else 
//  {
//      echo "Data Not Inserted!!!";
//  }

// }
 $result=$conn->query($q);

  if ($result==true) 
  {
    # code...
    $message = "Data Inserted Successfully...!";
echo "<script type='text/javascript'>alert('$message');</script>";
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
 <h4 class="text-white text-center">Product Management</h4>
 </div><br>
 
   <label>Name</label>
 <input required placeholder="Enter Name" type="text" name="name"  class="form-control"> <br>
 
 <label>Description</label>
 <input required placeholder="Enter your Description" type="text" name="description" class="form-control"> <br>

<label>Price</label>
 <input required placeholder="Enter your Price" type="number" name="price" class="form-control"> <br>

<label>Upload Photos</label>
  <input type="file" name="fileName1" multiple required class="form-control"><br>

  <label>Thumbnail images</label>
  <input type="file" name="fileName2" multiple required class="form-control"><br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
<?php
include 'includes/footer.php';
?>