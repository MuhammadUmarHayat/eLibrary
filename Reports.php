<?php include '../config.php';?>


<?php include 'header.php'; ?>

<hr>
  
	
                </form>
            </div>
			<div style="background-color:SlateBlue; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result1 = mysqli_query($con, "SELECT count(userid)As Total_Users FROM users where usertype='reader'"); 
$row1 = mysqli_fetch_assoc($result1); 
$s = $row1['Total_Users'];
echo "<br> <h2>Total Registered Readers : ".$s."</h2>";
 
        ?> 



</div>
<div style="background-color:MediumSeaGreen; float:left; width:40%; height:200px; padding: 10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT count(Bookid)As Total_Books FROM `Books`"); 
$row = mysqli_fetch_assoc($result); 
$in = $row['Total_Books'];
echo "<br> <h2>Total Books : ".$in."</h2>";
 
        ?> 
        </div>
		
		<div style="background-color:Gray; float:left; width:40%; height:200px; padding: 10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT count(id)As Total_Feedbacks FROM `feedbacks`"); 
$row = mysqli_fetch_assoc($result); 
$in = $row['Total_Feedbacks'];
echo "<br> <h2>Total Feedbacks : ".$in."</h2>";
 
        ?> 
        </div>
		
		
	<div style="background-color:Tomato; float:left; width:40%; height:200px; padding: 10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT distinct count(category)As Total_category FROM books"); 
$row = mysqli_fetch_assoc($result); 
$in = $row['Total_category'];
echo "<br> <h2>Total Category : ".$in."</h2>";
 
        ?> 
        </div>
			
		
    
</div>
</body>
</html>