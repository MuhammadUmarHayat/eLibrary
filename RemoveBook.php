
<?php include '../config.php'; 
 
// RemoveBook.php 
$id= $_GET['id'];
$userid=$_SESSION['userid'];
$statusMsg ="";

$insert = $con->query("DELETE FROM `userbooks` where `bookid`='$id'"); 
             if($insert){ 
               
                 $statusMsg = "Book is removed successfully."; 
            }else{ 
                $statusMsg = "Failed, please try again."; 
            }  
	



?>

<html>
<head>
<link rel="stylesheet" href="../myStyleFinal.css">

</head>
<title> Delete Books</title>
<body>
<h1>Delete Book</h1>
<a href="index.php">Reader Pannel</a></td><td><a href="../Logout.php"> Logout!</a>
<h3>
<?php echo $statusMsg; ?>

</h3>
<br>
</body>
</html>
   