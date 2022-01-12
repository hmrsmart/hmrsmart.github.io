<?php header('Access-Control-Allow-Origin: *'); 
	session_start();
	error_reporting(0);
	include('res/includes/config.php');
	if(strlen($_SESSION['userlogin'])==0){
		header('location:login1.php');
	}
    
    $sql = "SELECT FirstName,Picture from employees where Employee_Id=:employeeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':employeeid',$_SESSION['employeeid'],PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<!-- saved from url=(0063)index.php -->
<html lang="en" dir="rtl" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Neon is a bootstrap, laravel &amp; php admin dashboard template">
    <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, admin theme, bootstrap 4, laravel, php, crm, analytics, responsive, sass support, ui kits, web app, clean design">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>جامعة تكنولوجياالمعلومات والاتصالات</title>

    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Start CSS -->
    <!-- Chartist Chart CSS -->
    <link rel="stylesheet" href="./index_files/chartist.min.css">

    <!-- Datepicker CSS -->
    <link href="./index_files/datepicker.min.css" rel="stylesheet" type="text/css">

    <link href="./index_files/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./index_files/icons.css" rel="stylesheet" type="text/css">
    <!--
    <link href="./index_files/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    -->
    <link href="./index_files/style1.css" rel="stylesheet" type="text/css">
    <!-- End CSS -->

        <!-- Start JS -->        
    <script src="./index_files/jquery.min.js"></script>

    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="lang/summernote-ar-AR.js"></script>
</head>

<body class="xp-vertical" data-new-gr-c-s-check-loaded="14.1029.0" data-gr-ext-installed="">
    <!-- Search Modal -->
    <div class="modal search-modal fade" id="xpSearchModal" tabindex="-1" role="dialog" aria-labelledby="xpSearchModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="xp-searchbar">
                <form>
                    <div class="input-group">
                      <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn" type="submit" id="button-addon2">GO</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start XP Container -->
    <div id="xp-container">

        <!-- Start XP Leftbar -->
        <div class="xp-leftbar">    

            <!-- Start XP Sidebar -->
            <div class="xp-sidebar text-right">

                <!-- Start XP Logobar -->
                <div class="xp-logobar>
                    <a href="index.php" class="xp-logo"><img src="index_files/UOITC.svg" class="img-fluid" alt="UOITC">
                    
                    </a>
                </div>
                <!-- End XP Logobar -->

                <!-- Start XP Navigationbar -->
                <div class="xp-navigationbar active">
                    <ul class="xp-vertical-menu in">
                        
                        <li class="active">
                            <a href="index.php" class="active">
                              <i class="icon-speedometer"></i><span>لوحة القيادة</span>
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                              <i class="icon-layers"></i><span>البريد</span><i class="icon-arrow-left pull-left"></i>
                            </a>
                            <ul class="xp-vertical-submenu">
                                <li><a href="javaScript:load_page('email-inbox.php');">محفظة البريد</a></li>
                                <li><a href="javaScript:load_page('email-open.php');">فتح البريد</a></li>
                                <li><a href="index1.php?page=email-compose">ارسال كتاب</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javaScript:load_inside('events.php','xp-contentbar');">
                              <i class="icon-event"></i><span>المفكرة</span><span class="badge badge-pill badge-success pull-left">5</span>
                            </a>
                        </li>
                                                
                        <li>
                            <a href="javaScript:void();">
                                <i class="icon-user"></i><span>الموظفين</span><i class="icon-arrow-left pull-left"></i>
                            </a>
                            <ul class="xp-vertical-submenu">      
                                <li><a href="javaScript:load_inside('./res/employees/employees.php','xp-contentbar');">جميع الموظفين</a></li>                          
                                <li><a href="javaScript:load_inside('./res/employees/holidays.php','xp-contentbar');">العطل</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/leaves-employee.php','xp-contentbar');">اجازات الموظفين</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/departments.php','xp-contentbar');">الاقسام</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/designations.php','xp-contentbar');">التعيينات</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/timesheet.php','xp-contentbar');">ورقة التوقيتات</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/overtime.php','xp-contentbar');">الوقت الاضافي</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="icon-people"></i><span>الطلبة</span><i class="icon-arrow-left pull-left"></i>
                            </a>
                            <ul class="xp-vertical-submenu">
                                <li><a href="javaScript:load_inside('./res/employees/clients.php','xp-contentbar');">جميع الطلبة</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/projects.php','xp-contentbar');">المحاضرات</a></li>
                            </ul>
                        </li>
                        <li> 
								<a href="javaScript:load_inside('./res/employees/leads.php','xp-contentbar');"><i class="icon-briefcase"></i> <span>المشاريع</span></a>
							</li>
                        <li>
                                <a href="javaScript:void();">
								<i class="icon-book-open"></i> <span> الحسابات </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/invoices.php','xp-contentbar');">الفواتير</a></li>
									<li><a href="javaScript:load_inside('./res/employees/payments.php','xp-contentbar');">المدفوعات</a></li>
									<li><a href="javaScript:load_inside('./res/employees/expenses.php','xp-contentbar');">النفقات</a></li>
									<li><a href="javaScript:load_inside('./res/employees/provident-fund.php','xp-contentbar');">الصندوق</a></li>
									<li><a href="javaScript:load_inside('./res/employees/taxes.php','xp-contentbar');">الضرائب</a></li>
								</ul>
							</li>  

                        <li>
                                <a href="javaScript:void();">
								<i class="icon-credit-card"></i> <span> الرواتب </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/salary.php','xp-contentbar');">رواتب الموظفين</a></li>
									<li><a href="javaScript:load_inside('./res/employees/salary-view.php','xp-contentbar');">كشف الراتب </a></li>
									<li><a href="javaScript:load_inside('./res/employees/payroll-items.php','xp-contentbar');">فقرات الراتب </a></li>
								</ul>
							</li>  

                        <li>
                                <a href="javaScript:void();">
								<i class="icon-target"></i> <span> الاهداف </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/goal-tracking.php','xp-contentbar');">قائمة الاهداف </a></li>
									<li><a href="javaScript:load_inside('./res/employees/goal-type.php','xp-contentbar');">نوع الهدف </a></li>
								</ul>
						</li>

                        <li>
                                <a href="javaScript:void();">
								<i class="icon-note"></i> <span> التدريب </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/training.php','xp-contentbar');">قائمة التدريب </a></li>
									<li><a href="javaScript:load_inside('./res/employees/trainers.php','xp-contentbar');">المتدربين</a></li>
									<li><a href="javaScript:load_inside('./res/employees/training-type.php','xp-contentbar');">نوع التدريب </a></li>
								</ul>
						</li>  
                        <li><a href="javaScript:load_inside('./res/employees/promotion.php','xp-contentbar');"><i class="icon-arrow-up-circle"></i> <span>الترفيعات</span></a></li>
						<li><a href="javaScript:load_inside('./res/employees/resignation.php','xp-contentbar');"><i class="icon-logout"></i> <span>الاستقالة</span></a></li>
						<li><a href="javaScript:load_inside('./res/employees/termination.php','xp-contentbar');"><i class="icon-close"></i> <span>الفصل</span></a></li>
						
                        <li class="menu-title"> 
								<span>الادارة</span>
							</li>
							<li> 
								<a href="javaScript:load_inside('./res/employees/assets.php','xp-contentbar');"><i class="icon-drawer"></i> <span>الموجودات</span></a>
							</li>
							
							
						
							<li> 
								<a href="javaScript:load_inside('./res/employees/users.php','xp-contentbar');"><i class="icon-user-follow"></i> <span>المستخدمين</span></a>
							</li>
							
							<li class="menu-title"> 
								<span>الصفحات</span>
							</li>
							<li class="submenu">
								<a href="#" ><i class="icon-user-following"></i> <span> الملف الشخصي </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="javaScript:load_inside('./res/employees/profile.php','xp-contentbar');"> الملف الشخصي للموظف </a></li>
									<li><a href="javaScript:load_inside('./res/employees/client-profile.php','xp-contentbar');"> الملف الشخصي للطالب </a></li>
								</ul>
							</li>
							<li> 
								<a href="javaScript:load_inside('./res/employees/settings.php','xp-contentbar');"><i class="icon-settings"></i> <span>الاعدادات</span></a>
							</li>
							<li> 
								<a href="javaScript:load_inside('./res/employees/logout.php','xp-contentbar');"><i class="icon-power"></i> <span>تسجيل الخروج</span></a>
							</li>

                        
                    </ul>
                </div>
                <!-- End XP Navigationbar -->

            </div>
            <!-- End XP Sidebar -->

        </div>
        <!-- End XP Leftbar -->

        <!-- Start XP Rightbar -->
        <div class="xp-rightbar">

            <!-- Start XP Topbar -->
            <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row"> 

                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					
                        <div class="xp-menubar">
                            <a class="xp-menu-hamburger" href="javascript:void();">
                               <i class="icon-menu font-20 text-white"></i>
                             </a>
                         </div>
                    </div> 
                    <!-- End XP Col -->
					
                    <!-- Start XP Col -->
                    <div class="col-10 col-md-11 col-lg-11 order-1 order-md-2">
					
                        <div class="xp-profilebar text-left">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="xp-search">
                                        <a href="#" class="text-white" data-toggle="modal" data-target="#xpSearchModal"><i class="icon-magnifier"></i></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="dropdown xp-message">
                                        <a class="dropdown-toggle text-white" href="#" role="button" id="xp-message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-speech font-18 v-a-m"></i>
                                            <span class="badge badge-pill bg-success-gradient xp-badge-up">8</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-message">
                                            <ul class="list-unstyled">
                                              <li class="media">
                                                <div class="media-body">
                                                  <h5 class="mt-0 mb-0 py-3 text-white text-center font-16">8 New Messages</h5>
                                                </div>
                                              </li>  
                                              <li class="media xp-msg">
                                                <img class="mr-3 align-self-center rounded-circle" src="./index_files/user-message-1.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <a href="#">  
                                                        <h5 class="mt-0 mb-1 font-14">Ariel Blue<span class="font-12 f-w-4 float-right">3 min ago</span></h5>
                                                        <p class="mb-0 font-13">Thank you for attending...<span class="badge badge-pill badge-success float-right">2</span></p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media xp-msg">
                                                 <img class="mr-3 align-self-center rounded-circle" src="./index_files/user-message-2.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">Jammy Moon<span class="font-12 f-w-4 float-right">5 min ago</span></h5>
                                                        <p class="mb-0 font-13">Hey no worries! Trust me...<span class="badge badge-pill badge-success float-right">3</span></p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media xp-msg">
                                                 <img class="mr-3 align-self-center rounded-circle" src="./index_files/user-message-3.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">Lisa Ross<span class="font-12 f-w-4 float-right">5:25 PM</span></h5>
                                                        <p class="mb-0 font-13">Remedies for colic? i don't...<span class="badge badge-pill badge-success float-right">5</span></p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                                                        <a href="#" class="text-primary">View all</a>
                                                    </h5>
                                              </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="dropdown xp-notification">
                                        <a class="dropdown-toggle text-white" href="#" role="button" id="xp-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-bell font-18 v-a-m"></i>
                                            <span class="badge badge-pill bg-danger-gradient xp-badge-up">3</span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification">
                                            <ul class="list-unstyled">
                                              <li class="media">
                                                <div class="media-body">
                                                  <h5 class="mt-0 mb-0 py-3 text-white text-center font-16">3 New Notifications</h5>
                                                </div>
                                              </li>  
                                              <li class="media xp-noti">                                                
                                                <div class="mr-3 xp-noti-icon primary-rgba"><i class="icon-user-follow text-primary"></i></div>
                                                <div class="media-body">
                                                    <a href="#">  
                                                        <h5 class="mt-0 mb-1 font-14">New user registered</h5>
                                                        <p class="mb-0 font-12 f-w-4">2 min ago</p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon success-rgba"><i class="icon-basket-loaded text-success"></i></div>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">New order placed</h5>
                                                        <p class="mb-0 font-12 f-w-4">8:45 PM</p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon danger-rgba"><i class="icon-like text-danger"></i></div>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">John like your photo.</h5>
                                                        <p class="mb-0 font-12 f-w-4">Yesterday</p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                                                        <a href="#" class="text-primary">View all</a>
                                                    </h5>
                                                </div>
                                              </li>
                                            </ul>                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <div class="dropdown xp-userprofile">
                                        <a class="dropdown-toggle" href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./res/employees/<?php echo($results['Picture']) ?>" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-user-live"></span></a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                                            <a class="dropdown-item py-3 text-white text-center font-16" href="#">Welcome, John Doe</a>
                                            <a class="dropdown-item" href="#"><i class="icon-user text-primary mr-2"></i> Profile</a>
                                            <a class="dropdown-item" href="#"><i class="icon-wallet text-success mr-2"></i> Billing</a>
                                            <a class="dropdown-item" href="#"><i class="icon-settings text-warning mr-2"></i> Setting</a>
                                            <a class="dropdown-item" href="#"><i class="icon-lock text-info mr-2"></i> Lock Screen</a>
                                            <a class="dropdown-item" href="./logout.php"><i class="icon-power text-danger mr-2"></i> Logout</a>
                                        </div>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div> 
                <!-- End XP Row -->

            </div>
            <!-- End XP Topbar -->

            <!-- Start XP Breadcrumbbar -->                    
            <div class="xp-breadcrumbbar">
                <div class="row">
                    
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li id="dashboard-breadcrumb-item" class="breadcrumb-item active" aria-current="page">لوحة القيادة</li>
                            </ol>
                        </div>
                    </div>
                    
                </div>          
            </div>
            <!-- End XP Breadcrumbbar -->

            <!-- Start XP Contentbar -->    
            <div class="xp-contentbar">
            <?php

$page = $_GET['page'];
$pages = array('home', 'email-compose', 'subjects','student_p','records','record','addrecord','report','program','statistical','form137','list_report','student_report','users','school_year','grade','advisers','database','candidates','candidates_list', 'candidates_report','logs');
if (!empty($page)) {
    if(in_array($page,$pages)) {
        $page .= '.php';
        include($page);
    }
    else {
        echo 'Page not found. Return
        <a href="index1.php?page=home">home</a>';
    }
}

?>
            </div>
            <!-- End XP Contentbar -->

            <!-- Start XP Footerbar 
            <div class="xp-footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2021 UOITC - All Rights Reserved.</p>
                </footer>
            </div>-->
            <!-- End XP Footerbar -->

        </div>
        <!-- End XP Rightbar -->

    </div>
    <!-- End XP Container -->


    <!----> 
    <script src="./index_files/popper.min.js"></script>
    
    <script src="./index_files/bootstrap.min.js"></script>
    <!--
    <script src="./index_files/modernizr.min.js"></script>
    <script src="./index_files/detect.js"></script>-->
    <script src="./index_files/jquery.slimscroll.js"></script>
     
    <script src="./index_files/sidebar-menu.js"></script>
	
    <!-- Chartist Chart JS -->
    <script src="./index_files/chartist.min.js"></script>

    <!-- To Do List JS -->
    <script src="./index_files/to-do-list-init.js"></script>

    <!-- Datepicker JS 
    <script src="./index_files/datepicker.min.js"></script>
    <script src="./index_files/datepicker.en.js"></script>
-->
    <!-- Dashboard JS -->
    <script src="./index_files/dashborad.js"></script>

    <!-- Main JS -->
    <script src="./index_files/main.js"></script>
    <script src="./index_files/functions.js"></script>
    
   <!-- <script src="./index_files/test.js"></script>
     End JS -->


</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>