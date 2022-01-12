<?php 
	session_start();
	error_reporting(0);
	include('res/includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login.php');
	}
    
    $sql = "SELECT FirstName,Picture from employees where Employee_Id=:employeeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':employeeid',$_SESSION['employeeid'],PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetch(PDO::FETCH_ASSOC);

?>
<!-- include summernote css/js -->
<link href="./index_files/summernote.min.css" rel="stylesheet">
<script src="./index_files/summernote.min.js"></script>
<script src="./index_files/script.js"></script>
                        <div class="xp-email-rightbar">
                            <div class="card m-b-30 text-right">
                                <div class="card-header bg-white">
                                    <h5 class="card-title text-black">كتاب جديد</h5>
                                </div>
                                <div class="card-body">                                    
                                    <form>
                                      <div class="form-group row">
                                        <label for="emailTo" class="col-sm-2 col-form-label">الى</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control" id="emailTo" placeholder="اسم المرسل اليه">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="emailCc" class="col-sm-2 col-form-label">CC</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control" id="emailCc" placeholder="CC">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="emailBcc" class="col-sm-2 col-form-label">BCC</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control" id="emailBcc" placeholder="BCC">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="emailSubject" class="col-sm-2 col-form-label">الموضوع</label>
                                        <div class="col-sm-10">
                                          <input type="text" class="form-control" id="emailSubject" placeholder="الموضوع">
                                        </div>
                                      </div>                                      
                                      <div class="form-group row">
                                            <label for="emailSubject" class="col-sm-2 col-form-label">الكتاب</label>
                                            <div class="col-sm-10">
                                                <div id="summernote"></div>
                                            </div>
                                      </div>
                                      
                                      <div class="form-group row text-center">
                                        <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary my-1">ارسال <i class="icon-paper-plane"></i></button>
                                          <button type="submit" class="btn btn-success my-1">حفظ <i class="icon-drawer"></i></button>
                                          <button type="submit" class="btn btn-danger my-1">حذف <i class="icon-trash"></i></button>
                                        </div>
                                      </div>
                                    </form>
                                    <select id="select_language" onchange="updateCountry()"><option value="ar-EG">Arabic</option><option value="en-US">English</option></select>
                                       <button id="start-record-btn" title="Start Recording">Start Recognition</button>
                <button id="pause-record-btn" title="Pause Recording">Pause Recognition</button>
                <button id="save-note-btn" title="Save Note">Save Note</button>   
                <p id="recording-instructions">Press the <strong>Start Recognition</strong> button and allow access.</p>
                                </div>
                            </div>
                        </div>
<script>

$(document).ready(function() {

  $('#summernote').summernote({
        placeholder: 'السلام عليكم',
        tabsize: 1,
        lang: 'ar-AR'
      });

});
</script>                    