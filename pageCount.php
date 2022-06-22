<?php
require_once('fpdf/fpdf.php');
    require_once('fpdi/src/Fpdi.php');
// open this directory 
$myDirectory = opendir(".");
// get each entry
while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}
// close directory
closedir($myDirectory);
//	count elements in array
$indexCount	= count($dirArray);
//echo "$dirArray[4] $indexCount";
// sort 'em
sort($dirArray);
 $pdf2 =new FPDI();
 $total =0;
for($i=0; $i < $indexCount; $i++)
{
	$sl = strlen($dirArray[$i]);
	
	 if (substr("$dirArray[$i]", 0, 1) != "." && substr("$dirArray[$i]", ($sl-4), ($sl-1)) == ".pdf"){ 
		
			
			
			$pagecount = $pdf2->setSourceFile($dirArray[$i]);
			$pageNo[]=$pagecount;
			//echo "  $dirArray[$i] $pagecount <br >";
			$total = $total + $pagecount;
			
}

}
echo "<center> What I made when I was bored and wanted to count number of pages in a set of pdf files
<br>
<br> Total number of pages in <i>PDF File</i> = <b>$total </b></center><br>";

for($i=0,$j=0; $i< $indexCount; $i++)
{
	$sl = strlen($dirArray[$i]);
	if (substr("$dirArray[$i]", 0, 1) != "." && substr("$dirArray[$i]", ($sl-4), ($sl-1)) == ".pdf"){ 
	echo" <a href='$dirArray[$i]'>$dirArray[$i]</a> &nbsp;&nbsp;&nbsp; <i>$pageNo[$j] </i><br>";
	$j++;
}

}
?>
