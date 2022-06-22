<?php
include 'config.php';
  

 
 $userid=$_SESSION['userid'];
//ReaderFeedbacks.php
$statusMsg="";
if(isset($_POST['done']))
{
	//name,email,mobileno,message
	       $name = $_POST['name'];
            
			$email = $_POST['email'];
			$mobileno = $_POST['mobileno'];
		
			$message = $_POST['message'];
			$dates=date("Y-m-d");
			$query1="INSERT INTO `contacts`( `name`, `email`, `mobileno`, `message`, `dates`) VALUES ('$name','$email','$mobileno','$message','$dates')";
			$insert = $con->query($query1); 
             if($insert)
			 { 
		echo  $statusMsg="Thank you for your messages!";
		 }
	
}







include 'header.php';
 ?>
 <div  style="background-color:SlateBlue;color:white; width:30%; height:450px;float:left; padding:10px;margin-top:10px; margine:10px;">
 <table>
 <tr><td > <h2>Contact Information</h1></td></tr>
 <tr><td><h3>Name</h3></td></tr>
 <tr><td>Hafiz Muhammad Umar Hayat</td></tr>
 <tr><td><h3>Email</h3></td></tr>
 <tr><td>hafizmohemmedumar@gmail.com</td></tr>
 <tr><td><h3>Mobile Number</h3></td></tr>
 <tr><td>0333-4380922</td></tr></tr>
 <tr><td><h3>Address</h3></td></tr>
 <tr><td>Lahore, Pakistan</td></tr>
 
 </table>
 
 
 </div>
 <div style="background-color:#051622;  float:left; width:60%; height:550px; padding: 10px; margin-top:10px; margin-left: 30px;">
 <h2>Contact Us</h2>
 
 <form action="ContactUs.php" method="post">


<h3>Name</h3>
<input type="text" name="name"  id="name">
<h3>Email</h3>
<input type="text" name="email"  id="email">
<h3>Mobile Number</h3>
<input type="text" name="mobileno"  id="mobileno">
<h3>Message</h3>
<textarea id="message" name="message" rows="4" cols="50"></textarea>
<br>	
<input type="submit"  class="btn-success" id="done" name="done" value="Send" />
 </form>
 </div>


</body>
</html>