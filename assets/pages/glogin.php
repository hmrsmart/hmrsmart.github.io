<?php
	session_start();
	//error_reporting(0);
	include_once("res/includes/config.php");
	if($_SESSION['userlogin']>0){
		header('location:index.php');
	}elseif(isset($_POST['login'])){
		$_SESSION['userlogin'] = $_POST['username'];
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$sql = "SELECT FirstName,Employee_Id,UserName,Password from employees where UserName=:username";
		$query = $dbh->prepare($sql);
		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0){
			foreach ($results as $row) {
				$hashpass=$row->Password;
			}//verifying Password
			if (password_verify($password, $hashpass)) {
				$_SESSION['userlogin']=$row->FirstName;
				$_SESSION['employeeid']=$row->Employee_Id;
                $token = $_POST['token'];
                $_SESSION['token']=$token;
        $sql = "SELECT el_id from tokens where el_id = :el_id and token = :token";
		$query = $dbh->prepare($sql);
		$query->bindParam(':el_id',$row->Employee_Id,PDO::PARAM_STR);
        $query->bindParam(':token',$token,PDO::PARAM_STR);
		$query-> execute();
        $results=$query->fetch(PDO::FETCH_OBJ);
		if($query->rowCount() == 0 && $token !=''){
        $active = '1';    
        $sql = "INSERT INTO tokens (el_id, token, active) VALUES (:employeeid, :token, :active)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':employeeid',$_SESSION['employeeid'],PDO::PARAM_STR);
        $query->bindParam(':token',$token,PDO::PARAM_STR);
        $query->bindParam(':active',$active,PDO::PARAM_STR);
		$query-> execute();
        }else {
            $active = '1'; 
         $sql = "UPDATE tokens SET active = :active WHERE el_id = :employeeid and token = :token";
		$query = $dbh->prepare($sql);
		$query->bindParam(':employeeid',$_SESSION['employeeid'],PDO::PARAM_STR);
        $query->bindParam(':token',$token,PDO::PARAM_STR);
        $query->bindParam(':active',$active,PDO::PARAM_STR);
		$query-> execute();   
        }
            echo "<script>window.location.href= 'index.php'; </script>";
			}
			else {
				$wrongpassword='
				<div class="alert alert-danger alert-dismissible fade show text-right" role="alert">
				كلمة المرور غير صحيحة
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			}
		}
		//if username or email not found in database
		else{
			$wrongusername='
			<div class="alert alert-danger alert-dismissible fade show text-right" role="alert">
				اسم المستخدم غير صحيح
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0068)http://themesbox.in/admin-templates/neon/php/vertical/page-login.php -->
<html lang="en" dir="rtl" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Neon is a bootstrap, laravel &amp; php admin dashboard template">
    <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, admin theme, bootstrap 4, laravel, php, crm, analytics, responsive, sass support, ui kits, web app, clean design">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>جامعة تكنولوجياالمعلومات والاتصالات</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="index_files/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="index_files/font-awesome.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="index_files/style1.css">
    <!-- End css -->
    
    <!-- Start js -->        
		<script src="index_files/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="index_files/popper.min.js"></script>
		<script src="index_files/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="index_files/app.js"></script>
    <!-- End js -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
<script>
	var firebaseConfig = {
    apiKey: "AIzaSyDw1-jYrTRAg3hVKaovCY4lUrlyMIK027Y",
    projectId: "mypusher-1dea4",
    messagingSenderId: "218216252513",
    appId: "1:218216252513:web:05033b0d7846a3e4105620"
  };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");
                return messaging.getToken();
            })
            .then(function (token) {
                $("#token").val(token);
                console.log("Token : "+token);
                
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }
    IntitalizeFireBaseMessaging();
</script>
</head>

<body class="xp-vertical" data-new-gr-c-s-check-loaded="14.1031.0" data-gr-ext-installed="">

    <div class="xp-authenticate-bg"></div>
    <!-- Start XP Container -->
    <div id="xp-container" class="xp-container">

        <!-- Start Container -->
        <div class="container">

            <!-- Start XP Row -->
            <div class="row vh-100 align-items-center">
                <!-- Start XP Col -->
                <div class="col-lg-12 ">

                    <!-- Start XP Auth Box -->
                    <div class="xp-auth-box">

                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="./index.php" class="xp-web-logo"><img src="./index_files/logo-2.png" height="40" alt="logo"></a>
                                </h3>
                                <div class="p-3">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="text-center mb-3">
                                            <h4 class="text-black">تسجيل الدخول !</h4>
                                            <p class="text-muted">مستخدم جديد؟ <a href="./page-register.php">انشئ حساب</a> هنا</p>
                                        </div>                                        
                                        <div class="social-login text-center">
                                            <button type="button" class="btn btn-facebook btn-rounded mb-1"><i class="icon-social-facebook m-r-5"></i> Facebook </button>
                                            <button type="button" class="btn btn-googleplus btn-rounded mb-1"><i class="icon-social-google m-r-5"></i> Google+ </button>
                                        </div> 
                                        <div class="login-or">
                                            <h6 class="text-muted">او</h6>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" required="">
                                        </div>
										<?php if($wrongusername){echo $wrongusername;}?>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required="">
                                        </div>
										<?php if($wrongpassword){echo $wrongpassword;}?>
                                        <input type="hidden" class="form-control" name="token" id="token">
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <div class="custom-control custom-checkbox text-right">
                                                  <input type="checkbox" class="custom-control-input" name="rememberme">
                                                  <label class="custom-control-label" for="rememberme">تذكرني</label>
                                                </div>                                
                                            </div>
                                            <div class="form-group col-6 text-left">
                                              <label class="forgot-psw"> 
                                                <a name="forgot-psw" href="./page-forgotpsw.php">نسيت كلمة المرور؟</a>
                                              </label>
                                            </div>
                                        </div>                          
                                      <button type="submit" name="login" class="btn btn-primary btn-rounded btn-lg btn-block shadow">دخول</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End XP Auth Box -->

                </div>
                <!-- End XP Col -->
            </div>
            <!-- End XP Row -->
        </div>
        <!-- End Container -->
    </div>
    <!-- End XP Container -->

    <!-- End Containerbar -->
    
</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>