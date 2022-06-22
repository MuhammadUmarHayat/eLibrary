<?php include 'config.php';?>
<?php


 $userid = "";
$password = "";
if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid']))
	{
        if(!empty($_POST['password']))
	    {
			
            $userid = $_POST['userid'];
            $password = $_POST['password'];
   
   	
         $qry = "Select * from users where  userid= '$userid' and password='$password' and `status`='ok'";

            $results = mysqli_query($con, $qry);
            if ($results->num_rows> 0) //username and password is corract
			{
				$row = $results->fetch_assoc();
				
					$_SESSION['userid'] = $userid;//session
					
					$usertype=$row['usertype'];
					if($usertype=="admin"){
					
					header('Location:http://localhost/elibrary/admin/index.php');
					}
					else
					{
						
						
					header('Location:http://localhost/elibrary/reader/index.php');	
					}
					
					
            }
			
   
   			
			else 
			{
                echo "Invalid username or password.";
            }
			
        }
		else 
		{
           echo "Password field is empty.";
        }
    } 
	else 
	{
        echo "userid field is empty";
    }
	
	
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="myStyleFinal.css">




    <title>Login Form</title>
</head>
<body >
<div >
<div class="heading"> Library Online “elibrary.edu”   </div>
</div>
   <form method="POST" action="index2.php">
  <center> 
    <div id="navBar">
   
   <a style="color: #1BA098;  text-decoration: none;" href="index.php">Home </a>
           
         
		  
<a style="color: #1BA098;  text-decoration: none;"  href="AdminSignup.php">Register As Administrator</a>	  
		  
	<a style="color: #1BA098; text-decoration: none;"  href="ReaderSignup.php">Register As Reader </a>
       
     <a style="color: #1BA098; text-decoration: none;" href="About.php">About </a>	
<a style="color: white; text-decoration: none;" href="index2.php">Login </a>			  
		  
   </div>
   <img  src="g1.jpg" width=50% height=100px /> 
   
  
   
   
   
   
   <div style="margin:20px ">
<table>

<tr><td></td>
<td></td></tr>
<tr><td>Enter UserID </td><td><input type="text" name="userid"  id="username"></td></tr>
<tr><td>Enter User password  </td><td><input type="password" name="password"  id="password"></td></tr>
<tr><td></td><td><button type="submit" class="btn btn-success" name="done">Submit</button></td></tr>

</table>
 </center>
<br>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>