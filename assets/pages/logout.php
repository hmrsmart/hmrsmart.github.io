<?php
session_start(); 
//error_reporting(0);
	include_once("res/includes/config.php");
    $active = '0';
    try{
        $sql = "UPDATE tokens SET active = :active WHERE el_id = :employeeid and token = :token";
		$query = $dbh->prepare($sql);
		$query->bindParam(':employeeid',$_SESSION['employeeid'],PDO::PARAM_STR);
        $query->bindParam(':token',$_SESSION['token'],PDO::PARAM_STR);
        $query->bindParam(':active',$active,PDO::PARAM_STR);
		$query-> execute();  
    }
    catch (PDOException $e)
{
echo ("Error: " . $e->getMessage());
}
session_destroy(); // destroy session
header("location:login.php"); 
?>

