<?php include '../config.php'; 

 $userid=$_SESSION['userid'];
$title="";
 $id=$_GET['id'];
 $bookid=$id;
 $_SESSION['bookid']=$bookid;
$pageno="";
$isBookExist=0;
  $q="SELECT * FROM `readersession` where bookid='$id' and userid='$userid'";

 $result = $con->query($q); 
 
  if($result->num_rows > 0)
 { 
  $isBookExist=1;
 }
 else 
 {
	 $isBookExist=  0;
 }

if( $isBookExist==0)
{//new reader
	echo "<br> Welcome to this book";
	
	$query="SELECT * from books where bookid='$id'";
 $result = $con->query($query); 
 if($result->num_rows > 0)
 { 
 while( $row = $result->fetch_assoc())
		
		{	
			$title= $row['title'];
			 $path= $row['path'];
			 $pageno=1;
			$a="../admin/upload";
			$b="cs508.pdf";
			$dir="../admin/upload";
			
			 
		$file= preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);
 $split_filename = $dir.'/'.basename($file, '.pdf')."$pageno".'pdf.pdf';
		$page=$split_filename;

		}
		
 }
 else{
	 
// <embed src="cs508.pdf" type="application/pdf" width="80%" height="500px" />
	
	 echo "No book exist";
 }
	
	
	
	
	
	
}
else
{
	//old book reader
	//echo"<br>old book<br>";
	$q="SELECT * FROM `readersession` where bookid='$id' and userid='$userid' ORDER BY id DESC LIMIT 1";
	//$q="SELECT * FROM `readersession` where bookid='$id' and userid='$userid'";

 $result1 = $con->query($q); 
 
  if($result1->num_rows > 0)
 { 
$row1 = $result1->fetch_assoc();
  $pageno=$row1['pageno'];
 }
	
	
	
	
	$query="SELECT * from books where bookid='$id'";
 $result = $con->query($query); 
 if($result->num_rows > 0)
 { 
$row = $result->fetch_assoc();
$title= $row['title'];
			 $path= $row['path'];
			 $pageno=$pageno;
			$a="../admin/upload";
			$b="cs508.pdf";
			$dir="../admin/upload";
			
			 
		$file= preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);
 $split_filename = $dir.'/'.basename($file, '.pdf')."$pageno".'pdf.pdf';
		$page=$split_filename;

 }
	
	
	
	
	
	
	
}

//,
if(isset($_POST["Forward"]))
{
	//echo "<br>Forward <br>";
	//pageno
	 $pageno=$_POST['pageno'];
	  $pageno++;//forward
	$bookid=$_SESSION['bookid'];
	
	$query="SELECT * from books where bookid='$id'";
 $result = $con->query($query); 
 if($result->num_rows > 0)
 { 
 while( $row = $result->fetch_assoc())
		
		{	
			$title= $row['title'];
			 $path= $row['path'];
			 $pageno= $pageno;
			$a="../admin/upload";
			$b="cs508.pdf";
			$dir="../admin/upload";
			
			 
		$file= preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);
 $split_filename = $dir.'/'.basename($file, '.pdf')."$pageno".'pdf.pdf';
		$page=$split_filename;

		}
		
 }
 else{
	 
// <embed src="cs508.pdf" type="application/pdf" width="80%" height="500px" />
	
	 echo "No book exist";
 }
	
	
	
}
	
	
	
	
if(isset($_POST["Back"]))
{
	//echo "<br>Backword <br>";
	//pageno
	 $pageno=$_POST['pageno'];
	  $pageno--;//backword
	$bookid=$_SESSION['bookid'];
	
	$query="SELECT * from books where bookid='$id'";
 $result = $con->query($query); 
 if($result->num_rows > 0)
 { 
 while( $row = $result->fetch_assoc())
		
		{	
			$title= $row['title'];
			 $path= $row['path'];
			 $pageno= $pageno;
			$a="../admin/upload";
			$b="cs508.pdf";
			$dir="../admin/upload";
			
			 
		$file= preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);
 $split_filename = $dir.'/'.basename($file, '.pdf')."$pageno".'pdf.pdf';
		$page=$split_filename;

		}
		
 }
 else{
	 
// <embed src="cs508.pdf" type="application/pdf" width="80%" height="500px" />
	
	 echo "No book exist";
 }
	
	
	
}

//logout
	
	if(isset($_POST["logout"]))
{

$pageno=$_POST['pageno'];
	 // $pageno++;
	$bookid=$_SESSION['bookid'];
	$dates=date("Y-m-d");
	

$query1="INSERT INTO `readersession`( `userid`, `bookid`, `dates`, `pageno`, `status`) VALUES ('$userid','$bookid','$dates','$pageno','ok')";

	$insert = $con->query($query1); 
             if($insert)
			 { 
		 header('Location:http://localhost/elibrary/Logout.php');
		 }
	
}


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../myStyleFinal.css">
</head>

<title> Open Books</title>
<body>
<center>
<div>
<h1>Read your favourite Book</h1>

</div>
</center>

  <form method="POST" action="ReadBook.php?id=<?php echo $_SESSION['bookid'];?>">
  <div style="position: relative; float: right;">
 <input type="submit" class="btn-Red" name="logout" value="LogOut">
</div>
<table>
<tr>
<td><input type="submit" class="btn-Blue" name="Back" value="<<"></td>
<td><input type="Text" name="pageno" value="<?php echo $pageno;?>"></td>
<td><input type="submit" class="btn-Blue" name="Forward" value=">>"></td>
</tr>
<tr><td></td><td></td><td></td></tr>
</table>
</form>

<iframe src="<?php echo $page;?>" width="1000" height="1000"></iframe>

<br>
</body>
</html>
   