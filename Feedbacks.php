<?php include '../config.php';


$result = $con->query("SELECT * FROM feedbacks"); 

?>
<?php include 'header.php'; ?> 
<hr>

  <?php
if($result->num_rows > 0)
 { 
  while($row = $result->fetch_assoc())
		{

//`userid`, `bookid`, `message`, `dates`, `id` FROM `feedbacks`

			?> 
	<div style="float:left; padding: 10px;margin-top:0px;margin-left: 20px; width: 300px;border: 1px solid red;word-wrap:break-word;  ">
		<br>
	
		<br>
		<h2>
		<?php echo $row['userid'];?>
		</h2>
				<br>
           
	  Book Number   <?php echo $row['bookid'];?>
	   <br>
	  <h3>
	 Message  <?php echo $row['message'];?>
	  </h3>
	   <br>
	   <h3>
	 Date  <?php echo $row['dates'];?>
	  </h3>
	   <br>
	
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