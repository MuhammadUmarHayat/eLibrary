<?php include 'config.php';?>
<?php


 $userid = "";
$password = "";

// Get image data from database 
$result = $con->query("SELECT * FROM Books"); 
//`bookid`, `title`, `author`, `publisher`, `edittion`, `price`, `photo`, `status`, `category`

 include 'header.php';
?>


   <form method="POST" action="index.php">
<br>
<hr>

  <?php
if($result->num_rows > 0)
 { 
  while($row = $result->fetch_assoc())
		{ ?> 
	<div style="float:left; padding: 10px;margin-top:0px;margin-left: 20px; width: 300px;border: 1px solid red;word-wrap:break-word;  ">
		
		<h2>
		<?php echo $row['title'];?>
		</h2>
				
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100px height=100px /> 
    <br>
	  Book Number   <?php echo $row['bookid'];?>
	  
	  <h3>
	 Author  <?php echo $row['author'];?>
	  </h3>
	  
	   <h3>
	 Edittion  <?php echo $row['edittion'];?>
	  </h3>
	  
	Price  <?php echo $row['price'];?>
	   <br>
	 <?php  echo '<a style="color: #1BA098; text-decoration: none;" href="PreviewBook.php?id=' . $row['bookid'] .'">Preview Book</a>';
	echo '<br>';

?>
	  
 </div>

<?php 


	
//$con->close();	
} 
	 }else
	 { 
    echo "<br>Record not found <br>";
 }  
                    
?>		
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>