<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//session_start();
//	error_reporting(0);
	include('res/includes/config.php');
 $ppst = 'EMP-016574';
 $body = $_GET['body'];
 $esv = 'werwrwerw';
//$ppst = 'EMP-016574';   
 //$toid = 'toid';
 //$emailcc = 'emailcc0,emailcc1,emailcc2';
 //$subject = 'subject';
 //$body = 'body';

try{

        //$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"));
        $sql = "INSERT INTO `ext-test` (f1, f2) VALUES (:from_id, :body)";
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $dbh->prepare($sql);
        $query->bindParam(':from_id',$ppst,PDO::PARAM_STR);
        $query->bindParam(':body',$body,PDO::PARAM_STR);
		$query-> execute($e);
//echo $ppst.'-'.$toid.'-'.$emailcc.'-'.$subject.'-'.$body;
   }	  
catch(PDOException $e)
{
 //echo $e->getMessage();
}    

?>