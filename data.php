<?php
$title=$_POST['title'];

// echo "Name Is".$name ."Phone Number:".$phone;


include 'conn.php';
$cnt = 1;
$sql="INSERT INTO webtask(title)VALUES('$title')";

$result=mysqli_query($conn, $sql);

if($result){
    header("location: ./index.php");
}
else{
    // echo "Sorry We Can't Connect";
}

?>