<?php 


$file='test2.pdf';
header('Content-type:application/pdf');
header('Content-Disposition:inline;filename="'.$file.'"');
header('Cotent-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($file);





?>