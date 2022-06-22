<?php

session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'eLibraryDB');
if(mysqli_connect_error())
{
    die("DB Connection Failed");
}

?>