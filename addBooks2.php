
<?php 
require_once('fpdf/fpdf.php');
    require_once('fpdi/src/autoload.php');
include '../config.php';
$statusMsg="";

?>

<html>
<head>
<title>Add Books</title>
<link rel="stylesheet" href="../style1.css">
</head>

<body>
<div style="padding: 20px; border: 1px solid #999">


<h2>Add Books</h2>
<form enctype="multipart/form-data"
	action="<?php print $_SERVER['PHP_SELF']?>" method="post">
	

	<table>
<tr><td><a href="index.php">Home</a></td><td><a href="../logout.php"> Logout!</a></td></tr>



<tr><td>Enter Book Title:</td><td><input type="text" name="title"></td></tr>
<tr><td>Enter Author:</td><td><input type="text" name="author"></td></tr>
 <tr><td>Enter Publisher:</td><td><input type="text" name="publisher"></td></tr>
 
<tr><td>Enter price:</td><td><input type="Number" name="price"></td></tr>
 <tr><td>Enter Edittion:</td><td><input type="text" name="edittion"></td></tr>
 <tr><td>Enter Catgory:</td><td><input type="text" name="category"></td></tr>
 <tr><td>Enter Sub Catgory:</td><td><input type="text" name="subcategory"></td></tr>
<tr><td><label>Select Image File:</label></td><td><input type="file" name="image"></td></tr>
    
   <tr><td>Select pdf File</td><td> <input type="hidden" name="MAX_FILE_SIZE" value="500000" /> <input
	type="file" name="pdfFile" /></td>
	<td></td></tr>
	
	<tr><td>Summary:</td>
	<td>
	
	
	<textarea id="summary" name="summary" rows="4" cols="50">

</textarea>
	
	
	
	</td></tr>
	
	
<tr><td><input type="submit" class="btn btn-success" value="upload!" /></td></tr>	
	
    
	<tr><td></td><td><?php echo $statusMsg; ?> </td></tr>
	
	</table>
	
<p>

	<br />
<br />
</p>
</form>

</div>
</body>
</html>

<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "upload/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The file already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )//upload pdf file
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				
				print "<b>Pdf file uploaded successfully!<br/>";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				print "File location : upload/".$_FILES['pdfFile']['name']."<br/>";
				
				//`books`(`bookid`, `title`, `author`, `publisher`, `edittion`, `price`, `photo`, `status`, `category`, `path`)
				if(!empty($_FILES["image"]["name"])) //upload image
	{ 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
			
         
		$title= $_POST['title'];
		$author= $_POST['author'];
		 $publisher=$_POST['publisher'];
		 $price=$_POST['price'];
		 $edittion=$_POST['edittion'];
		 
		 $status1="available";
		 $path=$_FILES['pdfFile']['name'];
		 $category=$_POST['category'];
		
		 
		 		 $subcategory=$_POST['subcategory'];
		 //summary
		  $summary=$_POST['summary'];
		 
		 
		 
		 
		$q1="INSERT INTO `books`( `title`, `author`, `publisher`, `edittion`, `price`, `photo`, `status`, `category`,`subcategory`, `path`,`summary`) VALUES ('$title','$author','$publisher','$edittion','$price','$imgContent','$status1','$category','$subcategory','$path','$summary')";
            
            $insert = $con->query($q1); 
             if($insert){ 
                $status = 'success'; 
                $statusMsg = "Record is added successfully."; 
				
				$filename=$path;
				 $dir = 'upload';//directory
				 
				 try
		{
			
			// $totalPageCount=  FunctionCountPages($path);;
			// echo "<br> Total Pages ". $totalPageCount;
			 
			 
		for ($x = 1; $x <= 5; $x++) 
	{
  //echo "The number is: $x <br>";
  split_pdf($filename,$dir,$x,$x);
    }
		}
	catch(Exception $e)
	{
		// echo 'Caught exception: ',  $e->getMessage(), "\n";
		
	}
				
				
				
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
				
				
				
				
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
//define function
function split_pdf($filename1,$dir1,$pageFrom1,$pageTo1)
    {
		
        $filename       = $filename1; 
        $dir            = $dir1;//directory

        $pdf          = new \setasign\Fpdi\Fpdi();
        $pageCount      = $pdf->setSourceFile($dir.'/'.$filename);

        $pageFrom = $pageFrom1;
        $pageTo   = $pageTo1;
        $existCounter = 0;
        for ($i = $pageFrom; $i <= $pageTo; $i++) 
        {   
            $tpl  = $pdf->importPage($i);
            $pdf->getTemplateSize($tpl);
            $pdf->addPage();

            $pdf->useTemplate($tpl,['adjustPageSize' => true]);
            $existCounter++;
		 
        }
		 $file= preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
 $split_filename = $dir.'/'.basename($file, '.pdf')."$pageFrom1".'pdf.pdf';
        $pdf->Output($split_filename, "F");	
        

      //  echo "File splitted with ".$existCounter." number of pages!! Thanks!!";
    }


?>
