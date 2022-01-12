<?php 

session_start();
	error_reporting(0);
	include('res/includes/config.php');
 $ppst = $_POST['emid'];
 $toid = $_POST['toid'];
 $to_id = $_POST['to_id'];
 $emailcc = $_POST['emailcc'];
 $subject = $_POST['subject'];
 $body = $_POST['body'];
try
{
    
        $sql = "INSERT INTO mail (from_name, from_id, to_id, subject, body, attachment) VALUES (:from_name, :from_id, :to_id, :subject, :body, :attachment)";
		$query = $dbh->prepare($sql);
        $query->bindParam(':from_id',$ppst,PDO::PARAM_STR);
        $query->bindParam(':to_id',$emailcc,PDO::PARAM_STR);
        $query->bindParam(':from_name',$to_id,PDO::PARAM_STR);
        $query->bindParam(':subject',$subject,PDO::PARAM_STR);
        $query->bindParam(':body',$body,PDO::PARAM_STR);
        $query->bindParam(':attachment',$toid,PDO::PARAM_STR);
		$query-> execute();
//echo $ppst.'-'.$toid.'-'.$emailcc.'-'.$subject.'-'.$body;
}
catch (PDOException $e)
{
exit("Error");
}

    $url ="https://fcm.googleapis.com/fcm/send";
    $sql = "SELECT * FROM tokens WHERE el_id = :eid";
										$query = $dbh->prepare($sql);
                                        
                                        $query->bindValue(':eid', $emailcc);
										$query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC); 

function sendNotification(){
$url ="https://fcm.googleapis.com/fcm/send";    
$msg = "message";
$ttl = "title";  
$tokn = "fOiqeLv9VOIB7hgn6Mjb2x:APA91bHkO5go5DyPBrgQ1kRxh2b2dG6JsiZdQSisN0db7M5KelR-8BjlQR-9uLeEAJt2HVZlqDxVad4IrXrX-b2SsrTGo0gbLYizUMPwd29IUkmkwjV-xcpAM03IdQNREZNQ5xnUz1Bp";                               
    $fields=array(
        "registration_ids"=>array($tokn),
        "notification"=>array(
            "body"=>$msg,
            "title"=>$ttl,
            //"icon"=>$_GET['icon'],
            "click_action"=>"https://google.com"
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
//echo ($rows['token']);
sendNotification();  

?>