<?php include '../config.php'; 
 //`dresstype`, `category`, `price`
// Get image data from database 
if(isset($_POST["submit"]))
{

	    $id= $_GET['id'];
	
	    $title= $_POST['title'];
		$author= $_POST['author'];
		 $price=$_POST['price'];
		 
		 $category= $_POST['category'];
		 $subcategory= $_POST['subcategory'];
		 $status=$_POST['status'];
		 $edittion= $_POST['edittion'];
$summary=$_POST['summary'];
	
	//`title`, `author`,  `edittion`, `price`,  `status`, `category`, `subcategory`	
		
	$sql="UPDATE `Books` SET `title`='$title',`author`='$author',`price`='$price',`category`='$category',`subcategory`='$subcategory',`status`='$status',`edittion`='$edittion',`summary`='$summary' where `bookid`='$id'";
		
		
		
		
		
	
	$insert = $con->query($sql); 
             if($insert){ 
                $status = 'success'; 
                echo $statusMsg = "Record is updates successfully."; 
            }else{ 
               echo $statusMsg = "Failed, please try again."; 
            }  
	
	
	
	
}
$id= $_GET['id'];

$result = $con->query("SELECT * FROM Books where bookid='$id'"); 
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			//`title`, `author`,  `edittion`, `price`,  `status`, `category`, `subcategory`	
	$bookid=	$row['bookid'];
$title= $row['title'];
		$author= $row['author'];
		$edittion= $row['edittion'];
		$status= $row['status'];
		$category= $row['category'];
	    $price=$row['price'];
		$subcategory= $row['subcategory'];
		
		$summary= $row['summary'];
		
		
}
}




?>
<?php include 'header.php'; ?> 
<center>
<h1>
Edit Books!
</h1>
<br>
<form action="editBook.php?id=<?php echo $bookid; ?>" method="post">
<table>

<tr><td>ID</td><td><?php echo $bookid; ?></td></tr>
<tr><td>title</td><td><input type="Text" name="title" value="<?php echo $title; ?>"></td></tr>
<tr><td>author</td><td><input type="Text" name="author" value="<?php echo $author; ?>"></td></tr>
<tr><td>edittion</td><td><input type="Text" name="edittion" value="<?php echo $edittion; ?>"></td></tr>
<tr><td>category</td><td><input type="Text" name="category" value="<?php echo $category; ?>"></td></tr>
<tr><td>Sub category</td><td><input type="Text" name="subcategory" value="<?php echo $subcategory; ?>"></td></tr>
<tr><td>Price</td><td><input type="Number" name="price" value="<?php echo $price; ?>"></td></tr>
<tr><td>Status</td><td><input type="Text" name="status" value="<?php echo $status; ?>"></td></tr>
<tr><td>Summary</td><td>


<textarea id="summary" name="summary" rows="4" cols="50"  >
<?php echo $summary; ?>
</textarea>
	


</td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>


</table>
</form>
</center>
</body>
</html>
   