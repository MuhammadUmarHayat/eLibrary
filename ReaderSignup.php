<?php include 'config.php';?>
<?php 


if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid'])&& !empty($_POST['password']))
	{
       
          $userid = $_POST['userid'];
            $name = $_POST['name'];
			 $password = $_POST['password'];
			         // $email = $_POST['email'];
           
			          $mobile = $_POST['mobile'];
            $address = $_POST['address'];
			
			$usertype="reader";
			$status = "ok";
		
		
			 $qry = "Select * from users where  userid= '$userid' ";

            $results = mysqli_query($con, $qry);
            if ($results->num_rows> 0) //username and password is corract
			{
			echo "UserID must be unique";	
				
			}
			else
			{
			 $q1="INSERT INTO `users`(`name`, `userid`, `password`, `address`, `usertype`, `MobileNo`, `status`)VALUES ('$name','$userid','$password','$address','$usertype','$mobile','$status')";
		
			 $query = mysqli_query($con,$q1);
			
 
			echo 'User is registered successfully';
			}
		
	}
	else
	{
		
		echo "Please enter user name and password";
		
	}
}
else{
	
	
	
	echo "Please fill the form first";
}
}



?>
<?php include 'header.php'; ?> 
<div >


                <form method="POST" action="ReaderSignup.php">
			<center>	
			<table >
				<tr><td colspan="2"> <h4> Reader Registration Form </h4></td><td></td></tr>			
						
		<tr><td>Enter  User Name:</td><td><input type="text" name="name" required></td></tr>
			<tr><td>Enter  User ID: </td><td><input type="text" name="userid" required></td></tr>	
				
					
  

	<tr><td>Enter  Password:</td><td><input type="password" name="password" required></td></tr>				
	 			
				 
 <tr><td>Enter  address:</td><td><input type="text" name="address" required></td></tr>	
		
 
				<tr><td>Enter  Mobile Number:</td><td><input type="number" name="mobile" required></td></tr>	
			 
 	
 
                    <tr><td></td><td><button type="submit" class="btn btn-success" name="done">Submit</button></td></tr>
					
					</table>
                </center></form>
            </div>
        </div>
    </main>
</div>
</body>
</html>