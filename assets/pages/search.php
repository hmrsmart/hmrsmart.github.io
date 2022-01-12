<?php
    session_start();
	error_reporting(0);
	include('res/includes/config.php');

$stmt = $dbh->prepare('select * from employees where FirstName like :keyword');
$stmt->bindValue('keyword', '%'.$_POST['search'].'%');
$stmt->execute();
$result = array();
$json_arr = array();
while($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //$json_arr["name"] = $product->name;
  //$json_arr["price"] = $product->price;
	//array_push($result, $json_arr);
	$result[] = array("value"=>$product['Employee_Id'],"label"=>$product['FirstName']);
}
echo json_encode($result);
?>
