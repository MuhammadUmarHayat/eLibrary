<?php include '../config.php';?>
<?php
$userid=$_SESSION['userid'];

 $category1= "";
 $query1="";
 $result ="";



if(isset($_POST["search"]))
{
	
	
}
else if(isset($_POST["all"]))
{

		
	
}

else{
$query="SELECT books.bookid,books.title,books.photo,books.publisher,userbooks.userid,userbooks.bookid FROM books INNER JOIN userbooks ON books.bookid=userbooks.bookid";
 $result = $con->query($query); 




	
}	




 ?>

<?php include 'header.php'; ?> 
   
   
   
   
   

<br>
<hr>
  
	
              
            </div>
			




<center>
<div style="background-color:#f2f2f2; float:left; width:80%; height:1000px; padding: 10px; margin-left: 30px;">
  <?php
  
  
  
  
  
  
if($result->num_rows > 0)
 { 
  while($row = $result->fetch_assoc())
		{ ?> 
	
	<div style="float:left; padding: 10px;margin-top:0px;margin-left: 20px; width: 300px;border: 1px solid red;word-wrap:break-word;  ">
		<br>
	
		<br>
		<h2>
		<?php echo $row['title']?>
		</h2>
				<br>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100px height=100px /> 
      <br>
	  Book Number   <?php echo $row['bookid']?>
	 
	<br>
	  <?php  echo '<a class="btn btn-success" style="text-decoration: none;" href="ReadBook.php?id=' . $row['bookid'] .'">Read Book</a>';
	  echo '<br>'; echo '<br>';
	     echo '<a class="btn btn-danger" style="text-decoration: none;" href="RemoveBook.php?id=' . $row['bookid'] .'">Remove Book </a>';
	echo '<br>';

echo '<br>';?>
 </div>

<?php 


	
//$con->close();	
} 
	 
	 }
	 else
{ 
    echo "<br>Record not found <br>";
 }  
                    
?>		
        </div>
    </center>
</div>
  </form>
</body>
</html>