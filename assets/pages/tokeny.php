<?php

if(isset($_POST['employeeid']){
    
                $sql = "INSERT INTO tokens (el_id, token) VALUES (:employeeid, :token)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':employeeid',$_POST['employeeid'],PDO::PARAM_STR);
        $query->bindParam(':token',$_POST['token'],PDO::PARAM_STR);
		$query-> execute();
}
?>