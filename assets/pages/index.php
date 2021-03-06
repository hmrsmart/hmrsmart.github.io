<?php header('Access-Control-Allow-Origin: *'); 
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

     
    <!-- Chartist Chart CSS -->
    <link rel="stylesheet" href="./index_files/chartist.min.css">
 <!-- Start JS -->        
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="./index_files/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    -->
    <link href="./index_files/style1.css" rel="stylesheet" type="text/css">
    <!-- End CSS -->
    
    <link href="./assets/css/icons.css" rel="stylesheet" type="text/css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="./res/employees/akkhor/image/x-icon" href="img/favicon.png">
    
    <script src="./index_files/modernizr-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   
</head>

<body style="text-align: right" class="xp-vertical" data-new-gr-c-s-check-loaded="14.1029.0" data-gr-ext-installed="">
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
                              <i class="icon-speedometer" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>لوحة القيادة</span>
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                              <i class="icon-envelope-letter" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>البريد</span>
                              <span class="badge badge-pill badge-primary shadow">8</span>
                              <i class="icon-arrow-left pull-left"></i>
                            </a>
                            <ul class="xp-vertical-submenu">
                                <li><a href="javaScript:load_inside('./list-docs.php','xp-contentbar');">البريد الوارد</a></li>
                                <li><a href="javaScript:load_inside('./send-mail.html','xp-contentbar');">ارسال كتاب</a></li>
                                <li><a href="javaScript:load_inside('./create-mail.html','xp-contentbar');">انشاء كتاب</a></li>
                                <li><a href="javaScript:load_inside('./view-docs.html','xp-contentbar');">عرض كتاب</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javaScript:load_inside('events.php','xp-contentbar');">
                              <i class="icon-event" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>المفكرة</span><span class="badge badge-pill badge-warning shadow">5</span>
                            </a>
                        </li>
                                                
                        <li>
                            <a href="javaScript:void();">
                                <i class="icon-user" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الموظفين</span><i class="icon-arrow-left pull-left"></i>
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
                                <i class="icon-people" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الطلبة</span><i class="icon-arrow-left pull-left"></i>
                            </a>
                            <ul class="xp-vertical-submenu">
                                <li><a href="javaScript:load_inside('./res/employees/clients.php','xp-contentbar');">جميع الطلبة</a></li>
                                <li><a href="javaScript:load_inside('./res/employees/projects.php','xp-contentbar');">المحاضرات</a></li>
                            </ul>
                        </li>
                        <li> 
								<a href="javaScript:load_inside('./res/employees/leads.php','xp-contentbar');"><i class="icon-briefcase" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>المشاريع</span></a>
							</li>
                        <li>
                                <a href="javaScript:void();">
								<i class="icon-calculator" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span> الحسابات </span><i class="icon-arrow-left pull-left"></i>
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
								<i class="icon-credit-card" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span> الرواتب </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/salary.php','xp-contentbar');">رواتب الموظفين</a></li>
									<li><a href="javaScript:load_inside('./res/employees/salary-view.php','xp-contentbar');">كشف الراتب </a></li>
									<li><a href="javaScript:load_inside('./res/employees/payroll-items.php','xp-contentbar');">فقرات الراتب </a></li>
								</ul>
							</li>  

                        <li>
                                <a href="javaScript:void();">
								<i class="icon-target" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span> الاهداف </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/goal-tracking.php','xp-contentbar');">قائمة الاهداف </a></li>
									<li><a href="javaScript:load_inside('./res/employees/goal-type.php','xp-contentbar');">نوع الهدف </a></li>
								</ul>
						</li>

                        <li>
                                <a href="javaScript:void();">
								<i class="icon-badge" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span> التدريب </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/training.php','xp-contentbar');">قائمة التدريب </a></li>
									<li><a href="javaScript:load_inside('./res/employees/trainers.php','xp-contentbar');">المتدربين</a></li>
									<li><a href="javaScript:load_inside('./res/employees/training-type.php','xp-contentbar');">نوع التدريب </a></li>
								</ul>
						</li>  
                        <li><a href="javaScript:load_inside('./res/employees/promotion.php','xp-contentbar');"><i class="icon-arrow-up-circle" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الترفيعات</span></a></li>
						<li><a href="javaScript:load_inside('./res/employees/resignation.php','xp-contentbar');"><i class="icon-logout" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الاستقالة</span></a></li>
						<li><a href="javaScript:load_inside('./res/employees/termination.php','xp-contentbar');"><i class="icon-close" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الفصل</span></a></li>
						
                        <li class="menu-title"> 
								<span>الادارة</span>
							</li>
							<li> 
								<a href="javaScript:load_inside('./res/employees/assets.php','xp-contentbar');"><i class="icon-drawer" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الموجودات</span></a>
							</li>
							
							
						
							<li> 
								<a href="javaScript:load_inside('./res/employees/users.php','xp-contentbar');"><i class="icon-user-follow" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>المستخدمين</span></a>
							</li>
							
							<li class="menu-title"> 
								<span>الصفحات</span>
							</li>
							<li>
								<a href="javaScript:void();"><i class="icon-user-following" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span> الملف الشخصي </span><i class="icon-arrow-left pull-left"></i></a>
								<ul class="xp-vertical-submenu">
									<li><a href="javaScript:load_inside('./res/employees/profile.php','xp-contentbar');"> الملف الشخصي للموظف </a></li>
									<li><a href="javaScript:load_inside('./res/employees/client-profile.php','xp-contentbar');"> الملف الشخصي للطالب </a></li>
								</ul>
							</li>
                            <li class="menu-title"> 
								<span>ادارة الطالب</span>
							</li>
                            <li>
                                <a href="javaScript:void();">
								<i class="icon-graduation" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span> الجامعة </span><i class="icon-arrow-left pull-left"></i>
                                </a>
								<ul class="xp-vertical-submenu">
									<li class="flaticon-college"><a href="javaScript:load_inside('./res/employees/rector.php','xp-contentbar');">رئيس الجامعة </a></li>
									<li><a href="javaScript:load_inside('./res/employees/teachers.php','xp-contentbar');">كلية معلوماتية الاعمال</a></li>
									<li><a href="javaScript:load_inside('./res/employees/students.php','xp-contentbar');">كلية هندسة تكنولوجيا الاعلام </a></li>
                                    <li><a href="javaScript:load_inside('./res/employees/parents.php','xp-contentbar');">كلية المعلوماتية الطبية </a></li>
								</ul>

                        
                        <li>
                            <a href="javaScript:void();"><i class="icon-people" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الطلبة</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="index.php?page=res/employees/subsys/all-student" class="nav-link"><i></i>كل
                                        الطلبة</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/student-details.php','xp-contentbar');" class="nav-link"><i
                                           ></i>تفاصيل الطالب</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/admit-form.php','xp-contentbar');" class="nav-link"><i
                                           ></i>استمارة القبول</a>
                                </li>
                                <li><a href="javaScript:load_inside('./res/employees/classes.php','xp-contentbar');">المحاضرات</a></li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/student-promotion.php','xp-contentbar');" class="nav-link"><i
                                           ></i>ترقية الطالب</a>
                                </li>
                                <li class="nav-item">
                            <a href="index.php?page=res/employees/time-line" class="nav-link class="nav-link"><i
                                           ></i>مراحل التسجيل</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i
                                    class="icon-people" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>التدريسيين</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/all-teacher.php','xp-contentbar');" class="nav-link"><i></i>كل
                                        التدريسيين</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/teacher-details.php','xp-contentbar');" class="nav-link"><i
                                           ></i>تفاصيل التدريسي</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/add-teacher.php','xp-contentbar');" class="nav-link"><i></i>اضافة تدريسي</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/teacher-payment.php','xp-contentbar');" class="nav-link"><i
                                           ></i>الدفع</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i class="icon-people" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>اولياء الامور</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/all-parents.php','xp-contentbar');" class="nav-link"><i></i>كل
                                        اولياء الامور</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/parents-details.php','xp-contentbar');" class="nav-link"><i
                                           ></i>اولياء الامور تفاصيل</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/add-parents.php','xp-contentbar');" class="nav-link"><i></i>اضافة ولي امر</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i class="icon-book-open" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>المكتبة</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/show-books.php','xp-contentbar');" class="nav-link"><i></i>كل
                                        الكتب</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/add-book.php','xp-contentbar');" class="nav-link"><i></i>اضافة كتاب جديد</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i class="icon-credit-card" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الحساب</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/all-fees.php','xp-contentbar');" class="nav-link"><i></i>مجموع الاجور</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/all-expense.php','xp-contentbar');" class="nav-link"><i
                                           ></i>النفقات</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/add-expense.php','xp-contentbar');" class="nav-link"><i></i>اضافة
                                        النفقات</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i
                                    class="icon-direction" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>المرحلة</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/all-class.php','xp-contentbar');" class="nav-link"><i></i>كل
                                        المراحل</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/add-class.php','xp-contentbar');" class="nav-link"><i></i>اضافة مرحلة جديدة</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/all-subject.php','xp-contentbar');" class="nav-link"><i
                                    class="icon-notebook" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الموضوع</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/class-routine.php','xp-contentbar');" class="nav-link"><i class="icon-calendar" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>جدول المرحلة</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/student-attendence.php','xp-contentbar');" class="nav-link"><i
                                    class="icon-user-following" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الحضور</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i class="icon-note" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الامتحان</span><i class="icon-arrow-left pull-left"></i></a>
                            <ul class="xp-vertical-submenu">
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/exam-schedule.php','xp-contentbar');" class="nav-link"><i></i>جدول الامتحان</a>
                                </li>
                                <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/exam-grade.php','xp-contentbar');" class="nav-link"><i></i>درجات الامتحان</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/transport.php','xp-contentbar');" class="nav-link"><i
                                    class="icon-plane" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>النقل</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/hostel.php','xp-contentbar');" class="nav-link"><i class="icon-home" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>القسم الداخي</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/notice-board.php','xp-contentbar');" class="nav-link"><i
                                    class="icon-support" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>المساعدة</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="javaScript:load_inside('./res/employees/subsys/messaging.php','xp-contentbar');" class="nav-link"><i
                                    class="icon-bubbles" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>مراسللات</span><i class="icon-arrow-left pull-left"></i></a>
                        </li>
                        
							<li> 
								<a href="javaScript:load_inside('./res/employees/settings.php','xp-contentbar');"><i class="icon-settings" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>الاعدادات</span></a>
							</li>
                            <li> 
								<a href="javaScript:svedata();"><i class="icon-wrench" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>check</span></a>
							</li>
							<li> 
								<a href="javaScript:load_inside('./res/employees/logout.php','xp-contentbar');"><i class="icon-power" style="text-shadow: 4px 4px 16px #B0B0B0"></i><span>تسجيل الخروج</span></a>
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
            <div class="xp-topbar shadow">

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
                                            <span id="mspan" class="badge badge-pill bg-success-gradient xp-badge-up mspan  shadow">8</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="xp-message">
                                            <ul id="mul1" class="list-unstyled">
                                              <li class="media">
                                                <div class="media-body">
                                                  <h5 class="mt-0 mb-0 py-3 text-white text-center font-16"><span class="mspan">8</span> رسائل جديدة</h5>
                                                </div>
                                              </li>  
                                              <li class="media xp-msg">
                                                <img class="mr-3 align-self-center rounded-circle" src="./index_files/user-message-1.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <a href="#">  
                                                        <h5 class="mt-0 mb-1 font-14">Ariel Blue<span class="font-12 f-w-4 float-right">3 دقائق مضت</span></h5>
                                                        <p class="mb-0 font-13">Thank you for attending...<span class="badge badge-pill badge-success float-right">2</span></p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media xp-msg">
                                                 <img class="mr-3 align-self-center rounded-circle" src="./index_files/user-message-2.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">Jammy Moon<span class="font-12 f-w-4 float-right">5 دقائق مضت</span></h5>
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
                                                        <a href="#" class="text-primary">عرض الكل</a>
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
                                            <span id="nspan" class="badge badge-pill bg-danger-gradient xp-badge-up nspan shadow">2</span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification">
                                            <ul id="nul" class="list-unstyled">
                                              <li class="media">
                                                <div class="media-body">
                                                  <h5 class="mt-0 mb-0 py-3 text-white text-center font-16"><span class="nspan">2</span> تنبيهات جديدة</h5>
                                                </div>
                                              </li>  

                                              

                                              <li class="media xp-noti">                                                
                                                <div class="mr-3 xp-noti-icon primary-rgba"><i class="icon-user-follow text-primary"></i></div>
                                                <div class="media-body">
                                                    <a href="#">  
                                                        <h5 class="mt-0 mb-1 font-14">تم حضور موظف جديد</h5>
                                                        <p class="mb-0 font-12 f-w-4">قبل دقيقتين</p>
                                                    </a>
                                                </div>
                                              </li>
                                              
                                              <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon danger-rgba"><i class="icon-user-following text-danger"></i></div>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">تم ضمك الى فريق عمل</h5>
                                                        <p class="mb-0 font-12 f-w-4">البارحة</p>
                                                    </a>
                                                </div>
                                              </li>
                                              <li class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                                                        <a href="#" class="text-primary">عرض جميع التنبيهات</a>
                                                    </h5>
                                                </div>
                                              </li>
                                            </ul>                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <div class="dropdown xp-userprofile">
                                        <a class="dropdown-toggle" href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./index_files/<?php echo($results['Picture']) ?>" alt="X" class="rounded-circle img-fluid shadow"><span class="xp-user-live"></span></a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                                            <a class="dropdown-item py-3 text-white text-center font-16" href="#"><?php echo($results['FirstName']) ?></a>
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
                                <li class="breadcrumb-item"><a href="javaScript:load_inside('./home.html','xp-contentbar');"><i class="icon-home " style="text-shadow: 4px 4px 16px gray"></i></a></li>
                                <li id="dashboard-breadcrumb-item" class="breadcrumb-item active" aria-current="page">لوحة القيادة</li>
                            </ol>
                        </div>
                    </div>
                    
                </div>          
            </div>
            <!-- End XP Breadcrumbbar -->

            <!-- Start XP Contentbar -->    
            <div class="xp-contentbar text-right">
<?php

$page = $_GET['page'];
$pages = array('home', 'email-compose', 'subjects','student_p','records','record','addrecord','report','program','statistical','form137','list_report','student_report','users','school_year','grade','advisers','database','candidates','candidates_list', 'candidates_report','logs','test-mail');
if (empty($page)) {
    $page = 'home.html';
        include($page);
}
if (!empty($page)) {
    //if(in_array($page,$pages)) {
        $page .= '.php';
        include($page);
   // }
   // else {
   //     echo 'Page not found. Return
   //     <a href="index1.php?page=home">home</a>';
   // }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!--
    <script src="./index_files/modernizr.min.js"></script>
    <script src="./index_files/detect.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
     
    <script src="./index_files/sidebar-menu.js"></script>
	
    <!-- Chartist Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"></script>

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
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
 
<script>
my_id = <?php echo ('"'.$_SESSION['employeeid'].'"'); ?>;
my_name = <?php echo('"'.$results['FirstName'].'"') ?>;
//console.log("my_name is : "+my_name);
	var firebaseConfig = {
    apiKey: "AIzaSyDw1-jYrTRAg3hVKaovCY4lUrlyMIK027Y",
    projectId: "mypusher-1dea4",
    messagingSenderId: "218216252513",
    appId: "1:218216252513:web:05033b0d7846a3e4105620"
  };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    

    messaging.onMessage(function (payload) {
        console.log(payload);
        if (payload.notification.body == "notification"){
         nspn = parseInt($("#nspan").text(), 10);
         nspn++;
     $(".nspan").text(nspn);
     $('#nul li:nth-child(1)').after('<li class="media xp-noti"><div class="mr-3 xp-noti-icon success-rgba"><i class="icon-wallet text-success"></i></div><div class="media-body"><a href="#"><h5 class="mt-0 mb-1 font-14">تم صرف الراتب</h5><p class="mb-0 font-12 f-w-4">الان</p></a></div></li>');
     
     }
     if (payload.notification.body == "message"){
         mspn = parseInt($("#mspan").text(), 10);
         mspn++;
     $(".mspan").text(mspn);
     $('#mul1 li:nth-child(1)').after('<li class="media xp-msg"> <img class="mr-3 align-self-center rounded-circle" src="./index_files/user-hussein0.jpg" alt="Generic placeholder image"> <div class="media-body"> <a href="'+payload.notification.click_action+'">  <h5 class="mt-0 mb-1 font-14">حسين محمد<span class="font-12 f-w-4 float-right">الان</span></h5> <p class="mb-0 font-13">يرجى الاطلاع على الاعمام التالي<span class="badge badge-pill badge-success float-right">1</span></p> </a> </div> </li>');
     
     }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
            })
    });
</script>
</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>