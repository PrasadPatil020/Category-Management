<?php

// include 'conn.php';

// $id = $_GET['id'];

// $q = " DELETE FROM `insertjob` WHERE id = $id ";

// mysqli_query($con, $q);

// header('location:display.php');

?>

<?php

include 'conn.php';


$id = $_GET['id'];

$q1 = " DELETE FROM `insertcm` WHERE id = $id ";

mysqli_query($conn, $q1);
header('location:display1.php'); 
 // $s="SET @autoid :=0";
 // $squery = mysqli_query($conn,$s);
 
 // $a="UPDATE latest set id= @autoid := (@autoid+1)";
 // $aquery = mysqli_query($con,$a);
 
 // $l="ALTER TABLE insertjob AUTO_INCREMENT=1";
 // $lquery = mysqli_query($con,$l);


?>