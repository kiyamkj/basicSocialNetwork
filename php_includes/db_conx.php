<?php
$db = mysqli_connect("localhost", "root", "password", "dbbasicsocial");

if(mysqli_connect_errno()) {
	echo mysqli_connect_error();
	exit();	
} 

