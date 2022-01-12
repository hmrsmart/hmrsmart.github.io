<?php	
session_start();
	error_reporting(0);
	include('res/includes/config.php');
	
    ?>
            <!-- Start XP Contentbar -->    
            

                <!-- Start XP Row -->
                <div class="card height-auto">
                    <div class="card-body">
                        
                        <form id="myForm" action="javascript:;" onsubmit="fsub()" class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="بحث بواسطة اسم المرسل ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="بحث بواسطة الموضوع ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input id="datepicker" type="text" placeholder="بحث بواسطة التاريخ ..." class="form-control">
                                </div>
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                <button type="submit" class="btn btn-rounded btn-primary"><i class="icon-magnifier"></i> </button>
                                </div>
                            </div>
                        </form>
                        <div id="load_data" class="table-responsive">
                            <table id="mailsTable" class="table display data-table text-nowrap">
                                
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div id="load_data_message" class="card-footer bg-white">
                                    
                                </div>
                    </div>
                </div>

<script>

 var limit = 10;
 var start = 0;
 var sfld0 = '';
 var sfld1 = '';
 var sfld2 = '';
 var action = 'inactive';
 function fsub(){
 form = document.getElementById('myForm'); 
        sfld0 = form.elements[0].value;
        sfld1 = form.elements[1].value;
        sfld2 = form.elements[2].value;
        //action = 'inactive';     
        limit = 10;
        start = 0;
        $('#mailsTable > tbody').empty();
        load_country_data(limit, 0);
 }
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"data-load.php",
   method:"POST",
   data:{limit:limit, start:start, sfld0:my_id, sfld1:sfld0, sfld2:sfld1, sfld3:sfld2, tbl:4},
   cache:false,
   success:function(data)
   {
$("#dashboard-breadcrumb-item").text(" البريد الوارد");
console.log(my_id);
//var set = JSON.parse(data);
/* for (var key in data) {
    if (data.hasOwnProperty(key)) {
        console.log(key + " -> " + data[key]);
    }
}  */
var set = JSON.parse(data);
           
$( "#datepicker" ).datepicker();											
$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );									

inp = '';
   for(var i = 0; i < set.length; i++){
//------------------------------	   
					inp += '<tr '+((set[i].is_read==0) ? 'class="email-unread"' : '')+'>';                                                
					inp += '<td>';
					inp += '<div class="custom-control custom-checkbox">';
                    inp += '<input type="checkbox" class="custom-control-input" id="emailCheck'+set[i].id+'">';
                    inp += '<label class="custom-control-label psn-abs" for="emailCheck'+set[i].id+'"></label>';
                    inp += '</div>';
                    inp += '</td>';
                    inp += '<td><a href="#" onclick="update_mail(1,'+(1-set[i].star)+','+set[i].id+')"><i id="'+set[i].id+'" class="icon-star'+((set[i].star==0) ? " text-danger" : "")+' font-18"></i></td>';
                    inp += '<td><a href="#" onclick="viewdoc(\''+set[i].file_name+'\',\''+set[i].attachments+'\',\''+set[i].from_id+'\')">'+set[i].from_name+'</a></td>';
                    inp += '<td>'+((set[i].is_read==0) ? '<span class="badge badge-success badge-pill mr-2">New</span>' : '')+'<a href="#'+set[i].id+'" data-toggle="collapse" data-parent="#posts">'+set[i].subject+'</a></td>';
                    inp += '<td>'+set[i].date+'</td>';
                    inp += '</tr>'

$("#mailsTable > tbody").append(inp);
					inp = '';            
                                
	}

	   //alert(data["id"]);
    //$('#load_data').append(inp);
    if(set == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>لا توجد بيانات اضافية</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>يرجى الانتظار....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });


function update_mail(fld,info_str,db_key){  
    //alert(fld+","+info_str+","+db_key);
  $.ajax({
   url:"update-mail.php",
   method:"POST",
   data:{fld:fld,info_str:info_str,db_key:db_key},
   cache:false,
   success:function(data)
   {
      if (info_str==0) {
          $('li #'+db_key).removeClass('text-danger');
          }else{
          $('li #'+db_key).addClass('text-danger');
          }
 
   }
  });
}
</script>    
       
          