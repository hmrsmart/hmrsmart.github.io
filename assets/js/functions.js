
function load_page(fname){   
    console.clear();
$.get(fname, function(data) {
  //data = '<?php include_once("includes/header.php"); ?><?php include_once("includes/sidebar.php");?>' + data;
   $('.xp-contentbar').html(data)
}, 'text');

$("#dashboard-breadcrumb-item").text($(this).text());
}

function load_script(urls,tags){  

var head = document.getElementsByTagName("head")[0];
script = document.createElement(tags);
script.type = 'text/javascript';
script.src = urls;
script.onload = function() { 
    //alert("Success!"); 
    };
script.onerror = function(e) { 
    return ("failed: " + JSON.stringify(e)); 
    };
head.appendChild(script);

}

function load_inside(fname,targ){

//if (typeof my_id !== 'undefined') {
//$('.'+targ).empty();
console.clear();
   // $('.'+targ).load(fname);
      //window.location.hash = fname;
    //$(targ).load(fname);
$.get(fname, function(data) {
  // data = '<?php include_once("includes/header.php"); ?><?php include_once("includes/sidebar.php");?>' + data;
  // $('.'+targ).append(data);
   $('.'+targ).html(data)
});
//}else{
//  console.log("You should login!");
//}
}

function load_data(fname,targ){
$.ajax({
            url: 'includes/ajaxcomp.php',
            type: 'POST',        
            data: "complain="+complano+"&cexamno="+cexamno+"&cname="+cname+"&cmail="+cmail+"&s3capcha="+s3capcha,
            
            success: function(elar) {
    		
        		st = elar.split(",");
        		if (st[0]=='pass') document.getElementById("content").innerHTML='تم ارسال الشكوى بنجاح';
        		
        		if (st[0]=='cap'){
            		er1='1';
                    er2='1';
                    er3='1';
                    er4='0';
            		alert(st[1]); 
                }
    		
    		},
    		
            error: function(e){  
                document.getElementById("content").innerHTML='هنالك مشكلة في ارسال الشكوى'; 
            }
              
            });
}

function update_mail(fld,info_str,db_key){  
    //alert(fld+","+info_str+","+db_key);
  $.ajax({
   url:"update-mail.php",
   method:"POST",
   data:{fld:fld,info_str:info_str,db_key:db_key},
   cache:false,
   success:function(data)
   {

   }
  });
}

$.getMultiScripts = function(arr, path) {
    var _arr = $.map(arr, function(scr) {
        return $.getScript( (path||"") + scr );
    });
        
    _arr.push($.Deferred(function( deferred ){
        $( deferred.resolve );
    }));
        
    return $.when.apply($, _arr);
}
function viewdoc(fnm,ats,path){
docs = ats.split("|");    
    inp = `<div class="card height-auto">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
                                 
                                </ul>
                                <div class="tab-content" id="defaultTabContent">
                                 
                                </div>
                        <div id="load_data_message" class="card-footer bg-white">
                                    
                                </div>
                    </div>
                </div>`;

$( ".xp-contentbar" ).html(inp);
path = path+'/';
x = 1;
txt = '';
asd = '';
dclas = '';
if (fnm.length >=4){
    $( "#defaultTab" ).append('<li class="nav-item"><a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="true">الكتاب</a></li>');

$( "#defaultTabContent" ).append('<div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab"><iframe src="uploads/'+path+fnm+'" width="100%" height="500" type="application/pdf"></div>');
txt = 'المرفق '+x;
asd = 'false';
dclas = 'tab-pane fade';
x = 2;
}else{
txt = 'الكتاب';
asd = 'false';
dclas = 'tab-pane fade show active';    
}
jQuery.each(docs, function(index, item) {
    
    $( "#defaultTab" ).append('<li class="nav-item"><a class="nav-link" id="'+index+'-tab" data-toggle="tab" href="#a'+index+'" role="tab" aria-controls="'+index+'" aria-selected="'+asd+'">'+txt+'</a></li>');

$( "#defaultTabContent" ).append('<div class="'+dclas+'" id="a'+index+'" role="tabpanel" aria-labelledby="'+index+'-tab"><iframe src="uploads/'+path+item+'" width="100%" height="500" type="application/pdf"></div>');
//<embed src="'+item+'" width="100%" height="100%" type="application/pdf">
txt = 'المرفق '+(index+x);
asd = 'false';
dclas = 'tab-pane fade';
});    

}

function viewdrivedoc(fnm,ats){
docs = ats.split("|");    
    inp = `<div class="card height-auto">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
                                 
                                </ul>
                                <div class="tab-content" id="defaultTabContent">
                                 
                                </div>
                        <div id="load_data_message" class="card-footer bg-white">
                                    
                                </div>
                    </div>
                </div>`;

$( ".xp-contentbar" ).html(inp);

x = 1;
txt = '';
asd = '';
dclas = '';
if (fnm.length >=4){
    $( "#defaultTab" ).append('<li class="nav-item"><a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="true">الكتاب</a></li>');

$( "#defaultTabContent" ).append('<div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab"><iframe src="'+fnm+'" width="100%" height="500" type="application/pdf"></div>');
txt = 'المرفق '+x;
asd = 'false';
dclas = 'tab-pane fade';
x = 2;
}else{
txt = 'الكتاب';
asd = 'false';
dclas = 'tab-pane fade show active';    
}
jQuery.each(docs, function(index, item) {
    
    $( "#defaultTab" ).append('<li class="nav-item"><a class="nav-link" id="'+index+'-tab" data-toggle="tab" href="#a'+index+'" role="tab" aria-controls="'+index+'" aria-selected="'+asd+'">'+txt+'</a></li>');

$( "#defaultTabContent" ).append('<div class="'+dclas+'" id="a'+index+'" role="tabpanel" aria-labelledby="'+index+'-tab"><iframe src="'+item+'" width="100%" height="500" type="application/pdf"></div>');
//<embed src="'+item+'" width="100%" height="100%" type="application/pdf">
txt = 'المرفق '+(index+x);
asd = 'false';
dclas = 'tab-pane fade';
});    

}
