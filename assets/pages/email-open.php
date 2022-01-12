<?php
	include('res/includes/config.php');

$rid=intval($_GET['id']);
$eid=$_GET['eid'];

$sql1 = "SELECT * FROM employees where Employee_Id=:fromid";
		
		$query1 = $dbh->prepare($sql1);
		$query1->bindParam(':fromid',$eid,PDO::PARAM_STR);
		
		$query1-> execute();
		$resulte=$query1->fetch(PDO::FETCH_ASSOC);
		

$name=$_GET['name'];
$sql1 = "SELECT * FROM mail where id=:fromid";
		
		$query1 = $dbh->prepare($sql1);
		$query1->bindParam(':fromid',$rid,PDO::PARAM_STR);
		
		$query1-> execute();
		$resulty=$query1->fetch(PDO::FETCH_ASSOC);
?>
                        <div class="xp-email-rightbar">
                            <div class="card email-open-box m-b-30">

                                <div class="card-header bg-white">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><h5 class="mt-2 mb-0 text-black"><?php echo($resulty['subject']); ?></h5></li>
                                        <li class="list-inline-item float-right"><a href="http://themesbox.in/admin-templates/neon/php/vertical/email-open.php#"><i class="icon-screen-tablet font-24"></i></a></li>
                                        <li class="list-inline-item float-right"><a href="http://themesbox.in/admin-templates/neon/php/vertical/email-open.php#"><i class="icon-printer font-24 mr-2"></i></a></li>
                                    </ul>
                                </div>

                                <div class="card-body">                                    
                                    <div class="row m-b-30">
                                        <div class="col-md-5">
                                            <div class="media">
                                              <img class="align-self-center mr-3" src="res/employees/<?php echo htmlentities($resulte['Picture']); ?>" alt="Generic placeholder image">
                                              <div class="media-body">
                                                <h6 class="mt-0 text-black"><?php echo($resulte['FirstName']); ?></h6>
                                                <p class="text-muted mb-0">info@domain.com</p>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="open-email-head">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><?php echo($resulty['date']); ?></li>
                                                    <li class="list-inline-item"><a href="http://themesbox.in/admin-templates/neon/php/vertical/email-open.php#"><i class="icon-star font-24"></i></a></li>
                                                    <li class="list-inline-item"><a href="http://themesbox.in/admin-templates/neon/php/vertical/email-open.php#"><i class="icon-action-undo font-24"></i></a></li>
                                                    <li class="list-inline-item"><a href="http://themesbox.in/admin-templates/neon/php/vertical/email-open.php#"><i class="icon-options-vertical font-24"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                           <?php echo($resulty['body']); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-white">
                                    <div class="open-email-footer">
									
									<?php 
									if ($resulty['attachment']!=""){
										echo htmlentities('<div class="row m-b-30"><div class="col-md-3"><div class="card"><img class="card-img-top" src="./attachments/'.$resulty['attachment'].'" alt="Generic placeholder image"><div class="card-body text-center"><a href="http://themesbox.in/admin-templates/neon/php/vertical/email-open.php#">Download</a></div></div></div>');
									}
		$sql1 = "UPDATE mail SET is_read =1 where id=:fromid";
		$query1 = $dbh->prepare($sql1);
		$query1->bindParam(':fromid',$rid,PDO::PARAM_STR);
		$query1-> execute();
									?>
									
									
                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-mail-reply"></i>اجابة</button>
                                                <button type="button" class="btn btn-secondary">تحويل <i class="fa fa-mail-forward"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>