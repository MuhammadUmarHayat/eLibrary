
<?php
include '../config.php';
  

 
 $userid=$_SESSION['userid'];
//ReaderFeedbacks.php
$statusMsg="";
if(isset($_POST['done']))
{
	
	       $userid = $userid;
            
			$booktitle = $_POST['booktitle'];
			$messages = $_POST['message'];
			$dates=date("Y-m-d");
			$query1="INSERT INTO `feedbacks`(`userid`, `bookid`, `message`, `dates`) VALUES ('$userid','$booktitle','$messages','$dates')";
			$insert = $con->query($query1); 
             if($insert)
			 { 
		echo  $statusMsg="Thank you for your feedbaks!";
		 }
	
}







include 'header.php';
 ?>
  
 <center>
 <div>
 <h2>Add Books</h2>
 
 <form action="ReaderFeedbacks.php" method="post">
	

	<table>




<tr><td>User ID </td>
<td><?php echo $userid;?> </td></tr>
<tr><td>Book Title</td><td>
 <select name="booktitle">
    <option disabled selected>-- Select Book Title--</option>
	
    <?php
	//booktitle,messages
     include "../config.php";   // Using database connection file here
        $records = mysqli_query($con, "Select * from `books` ");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['title'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td></tr>
 <tr><td>Enter Your Message </td><td>
 
<textarea id="message" name="message" rows="4" cols="50"></textarea>
	
 </td></tr>
 

	
	
	
	
    
	<tr><td></td><td><input type="submit"  class="btn-success" id="done" name="done" value="Send" />
	
	</td></tr>
	
	</table>

 
 
 
 </form>
 </div>
</center>

</body>
</html>