<?php
	session_start();
	error_reporting(0);
	include('res/includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}
if(isset($_POST["limit"], $_POST["start"]))
{

$tbl = $_POST["tbl"];
switch ($tbl) {
    case 0:
        $tbl = "books";
        $fld1 = "name";
        $fld2 = "subject";
        $fld3 = "author";
        break;
    case 1:
        $tbl = "students";
        $fld1 = "Name";
        $fld2 = "Class";
        $fld3 = "Section";
        break;
    case 2:
        $tbl = "teachers";
        $fld1 = "Name";
        $fld2 = "Class";
        $fld3 = "Subject";
        break;
        case 3:
        $tbl = "mail";
        $fld1 = "from_name";
        $fld2 = "subject";
        $fld3 = "date";
        break;
        case 4:
        $tbl = "mailpdf";
        $fld0 = "to_id";
        $fld1 = "from_name";
        $fld2 = "subject";
        $fld3 = "date";
        break;
}

    //$tbl = "books";
//include('res/includes/config.php');
//$empid = "EMP-016574";
//$empid = $_SESSION['employeeid'];
try
{
//$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
 // $sql = "SELECT * FROM mail ORDER BY id DESC LIMIT :start,:limit";
  $sql = "SELECT * FROM ".$tbl." WHERE ".$fld0." LIKE :fld0 AND ".$fld1." LIKE :fld1 AND ".$fld2." LIKE :fld2 AND ".$fld3." LIKE :fld3 ORDER BY id DESC LIMIT :start,:limit";
										$query = $dbh->prepare($sql);
                                        $query->bindValue(':start', (int) $_POST["start"], PDO::PARAM_INT); // make sure to keep (int) when passing in a variable.
                                        $query->bindValue(':limit', (int) $_POST["limit"], PDO::PARAM_INT);
                                        $query->bindValue(':fld0', '%'.$_POST["sfld0"].'%', PDO::PARAM_STR);
                                        $query->bindValue(':fld1', '%'.$_POST["sfld1"].'%', PDO::PARAM_STR);
                                        $query->bindValue(':fld2', '%'.$_POST["sfld2"].'%', PDO::PARAM_STR);
                                        $query->bindValue(':fld3', '%'.$_POST["sfld3"].'%', PDO::PARAM_STR);
                                        //$query->bindValue(':tbl', $tbl);
                                       // $query->bindValue(':empid', $empid, PDO::PARAM_STR);
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