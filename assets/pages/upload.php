<?php
    session_start();
	error_reporting(0);
	include('res/includes/config.php');
$statusMsg = 'errrrrrror';
//file upload path
$targetDir = "uploads/";
if(isset($_POST["stat"])) {
    if($_POST["stat"]=='delete'){
$t= $targetDir . $_POST['my_id']."/".$_POST['name'];
echo $t;
unlink($t);
$statusMsg = $t;
    }
}else {

        //$pdfname = "";
        $sql = "SELECT max(id) FROM mailpdf where from_id = :from_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':from_id',$_POST['my_id'],PDO::PARAM_STR);
        $query->execute();
        $rows = $query->fetch(PDO::FETCH_ASSOC);
       // $pdfname = ($rows['max(id)']+1).".pdf";

$fileName = ($rows['max(id)']+1)."_".basename($_FILES["file"]["name"]);
if (!file_exists($targetDir . $_POST['my_id'])) {
    mkdir($targetDir . $_POST['my_id'], 0777, true);
}
$targetFilePath = $targetDir . $_POST['my_id']."/".$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])) {
    //allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        //upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $statusMsg = $targetFilePath;
            
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}
//display status message
echo $statusMsg;
?>