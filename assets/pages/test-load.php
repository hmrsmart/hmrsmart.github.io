<?php
	session_start();
	error_reporting(0);
	include('res/includes/config.php');
	
if(isset($_POST["limit"], $_POST["start"]))
{
//include('res/includes/config.php');
//$empid = "EMP-016574";
$empid = $_SESSION['employeeid'];
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"));
 // $sql = "SELECT * FROM mail ORDER BY id DESC LIMIT :start,:limit";
  $sql = "SELECT mail.*,employees.FirstName,employees.LastName FROM mail inner JOIN employees ON mail.from_id = employees.Employee_Id and mail.to_id LIKE :empid ORDER BY mail.id DESC LIMIT :start,:limit";
										$query = $dbh->prepare($sql);
                                        $query->bindValue(':start', (int) $_POST["start"], PDO::PARAM_INT); // make sure to keep (int) when passing in a variable.
                                        $query->bindValue(':limit', (int) $_POST["limit"], PDO::PARAM_INT);
                                        $query->bindValue(':empid', "%".$empid."%", PDO::PARAM_STR);
										$query->execute();

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($rows);
}

?>