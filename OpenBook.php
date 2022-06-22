<?php include '../config.php'; 
 //`dresstype`, `category`, `price`
// Get image data from database 
$id= "";;
$statusMsg ="";$path="";
$userid=$_SESSION['userid'];
$title="";
 $bookid=$id;
$pageno="";
$page="";


if(isset($_GET['id']))
{
$id=$_GET['id'];
$_SESSION['bookid']=$id;
	
}
else{
	
$id=$_SESSION['bookid'];
	
}






if(isset($_POST["go"]))
{
	 
	 $pageno=$_POST['pageno'];
	$bookid=$_SESSION['bookid'];
	$query="SELECT * from books where bookid='$bookid'";
 $result = $con->query($query); 
 if($result->num_rows > 0)
 { 
 while( $row = $result->fetch_assoc())
		
		{	
			$title= $row['title'];
			 $path= $row['path'];
			 
			 
			 
			$a="../admin/upload";
			$b="cs508.pdf";
			//<?php echo $path;
			
			   $page=$a."//".$path."#page=".$pageno;
		
			

		}
		
 }
 else{
	 
// <embed src="cs508.pdf" type="application/pdf" width="80%" height="500px" />
	
	 echo "No book exist";
 }

	
	
}
else
{
	
	$query="SELECT * from books where bookid='$id'";
 $result = $con->query($query); 
 if($result->num_rows > 0)
 { 
 while( $row = $result->fetch_assoc())
		
		{	
			$title= $row['title'];
			 $path= $row['path'];
			 
			 
			 
			$a="../admin/upload";
			$b="cs508.pdf";
			//<?php echo $path;
			
			  $page= $a."//".$path."#page=1";
		
			

		}
		
 }
 else{
	 
// <embed src="cs508.pdf" type="application/pdf" width="80%" height="500px" />
	
	 echo "No book exist";
 }

	
	
}







?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style1.css">
</head>
<title> Open Books</title>
<body>
<h1>Read your favourite Book</h1>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link " href="index.php">Home
            
          </a>
        </li>
        
      
    </div>
	<div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active "  href="#">Reader Books
            
          </a>
        </li>
        
      
    </div>
	<div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="../Logout.php">Logout
            
          </a>
        </li>
        
      
    </div>
	
	
	
	
  </div>
</nav>



  <form method="POST" action="OpenBook.php?id=<?php echo $_SESSION['bookid']; ?>">
<table>
<tr><td></td><td><input type="Text" name="pageno" value=""></td>
<td><input type="submit" class="btn btn-info" name="go" value="Go"></td></tr>
<tr><td></td><td></td><td></td></tr>
</table>
</form>

<iframe src="<?php echo $page;?>" width="1000" height="1000"></iframe>

<br>
</body>
</html>
   