<?php include '../config.php'; 
 //`dresstype`, `category`, `price`
// Get image data from database 
$id= $_GET['id'];
$statusMsg ="";

$insert = $con->query("Delete from `Books` where `bookid`='$id'"); 
             if($insert){ 
               
                 $statusMsg = "Record is deleted successfully."; 
            }else{ 
                $statusMsg = "Failed, please try again."; 
            }  
	



?>

<?php include 'header.php'; ?> 
<h3>
<?php echo $statusMsg; ?>

</h3>
<br>
</body>
</html>
   