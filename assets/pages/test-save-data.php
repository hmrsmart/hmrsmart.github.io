<?php 

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