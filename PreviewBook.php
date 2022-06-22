

<?php include 'config.php'; 


$userid=$_SESSION['userid'];
echo "Welcome ".$userid;

 //PreviewBook
if(isset($_POST["submit"]))
{

	header('Location:http://localhost/elibrary/index2.php');
	
}
$id= $_GET['id'];

//SELECT `userid`, `bookid`, `status`, `id`, `dates`, `remarks` FROM  WHERE  `bookid`=''


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
		$photo=$row['photo'];
		
}
}





?>
<html>
<link rel="stylesheet" href="myStyleFinal.css">



</head>
<title> Preview Book</title>
<body>

<h1>
Preview Books!
</h1>
<br>
<form action="PreviewBook.php?id=<?php echo $bookid; ?>" method="post">
<table>
<tr><td>



</td></tr>
<tr><td></td><td>
 <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($photo); ?>" width=100px height=100px /> 
 </td></tr>
<tr><td>ID</td><td><?php echo $bookid; ?></td></tr>
<tr><td>title</td><td><?php echo $title; ?></td></tr>
<tr><td>author</td><td><?php echo $author; ?></td></tr>
<tr><td>edittion</td><td><?php echo $edittion; ?></td></tr>
<tr><td>category</td><td><?php echo $category; ?></td></tr>
<tr><td>Sub category</td><td><?php echo $subcategory; ?></td></tr>
<tr><td>Price</td><td><?php echo $price; ?></td></tr>
<tr><td>Status</td><td><?php echo $status; ?></td></tr>
<tr><td>Summary</td><td><?php echo $summary; ?>

</td></tr>
<tr><td></td><td>


<input id ="btnSubmit" type="submit" name="submit" class="btn-success" value="Read Book">
</td></tr>


</table>
</form>
</body>
</html>
   