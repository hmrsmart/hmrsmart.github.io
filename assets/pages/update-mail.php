<?php
	session_start();
	error_reporting(0);
	include('res/includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}
if(isset($_POST["fld"], $_POST["info_str"], $_POST["db_key"]))
{
switch ($_POST["fld"]) {
    case 0:
        $fld = "is_read";
        break;
    case 1:
        $fld = "star";
        break;
    case 2:
        $fld = "snoozed";
        break;
}
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"));
       $sql = "UPDATE mail SET ".$fld." = :info_str where id = :db_key";
 
										$query = $dbh->prepare($sql);
                                      //  $query->bindValue(':fld', $_POST["fld"], PDO::PARAM_STR);
                                      $query->bindValue(':info_str', (int) $_POST["info_str"], PDO::PARAM_INT);
                                      $query->bindValue(':db_key', (int) $_POST["db_key"], PDO::PARAM_INT);
										$query->execute();

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

 echo ("Good");
}

?>