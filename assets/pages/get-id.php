<?php

session_start();
	error_reporting(0);
	include('res/includes/config.php');        
        $sql = "SELECT max(id) FROM mailpdf where from_id = :from_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':from_id',$_POST['my_id'],PDO::PARAM_STR);
        $query->execute();
        $rows = $query->fetch(PDO::FETCH_ASSOC);
$id = $rows['max(id)']+1;        
echo $id;
?>