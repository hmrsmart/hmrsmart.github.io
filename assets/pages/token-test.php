<?php

//session_start();
	//error_reporting(0);
	include('res/includes/config.php');   
    $tokn1 = $_GET['to_id'];  
    $active = '1'; 
    
try {    
    $sql = "SELECT token FROM tokens WHERE :eid LIKE concat('%',el_id,'%') AND active = :active";
	$query = $dbh->prepare($sql);
    $query->bindValue(':eid', $tokn1,PDO::PARAM_STR);
    $query->bindValue(':active', $active,PDO::PARAM_STR);
	$query->execute();
    $rows = $query->fetchAll(PDO::FETCH_COLUMN,0);
var_dump($rows);     
echo '<br>'.$query->rowCount().'<br>';     
}
catch (PDOException $e)
{
echo $e.'<br>';
exit("Error");
}    
    
if($query->rowCount() > 0){    
$tokn = $rows;     
function sendNotification($tok){
$url ="https://fcm.googleapis.com/fcm/send";    
$msg = "message";
$ttl = "title";  
    $fields=array(
        "registration_ids"=>$tok,
        "notification"=>array(
            "body"=>$msg,
            "title"=>$ttl,
            //"icon"=>$_GET['icon'],
            "click_action"=>"javaScript:viewdoc('','70_1.pdf','EMP-743619')"
        )
    );

    $headers=array(
        'Authorization: key=AAAAMs6zxGE:APA91bEb43RnLRZLb7klN1eqo4xKoio9CGoRsysL7ZcnulH5GloUj4R3kRw9z1pCnEU6lBOocjF8kGX00W1tw9dlhGfjBSMg_zrTQXkVuOraA7D_Y_9MZXbWHAMvsHE7fesz6WthYy7K',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    //print_r($result);
    curl_close($ch);
}
sendNotification($tokn); 
} 