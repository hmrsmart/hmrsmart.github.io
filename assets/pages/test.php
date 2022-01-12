<!DOCTYPE html>
<html dir="rtl">
 <head>
 <meta charset="utf-8">
  <title>Webslesson Tutorial | Auto Load More Data on Page Scroll with Jquery & PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <h2 align="center">Auto Load More Data on Page Scroll with Jquery & PHP</a></h2>
   <br />
   <div id="load_data"></div>
   <div id="load_data_message"></div>
   <br />
   <br />
   <br />
   <br />
   <br />
   <br />
  </div>
 </body>
</html>
<script>

$(document).ready(function(){
 
 var limit = 4;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"test-load.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    var set = JSON.parse(data);
inp = '';
   for(var i = 0; i < set.length; i++){
	   
	   
	   
      //console.log(set[i].id,set[i].subject,set[i].body);
   
	   //var tmp = data.split("^,^");
	   inp += '<div class="panel-heading"><h4 class="panel-title"><a href="#'+set[i].id+'" data-toggle="collapse" data-parent="#posts">'+set[i].subject+'</a></h4></div><div id="'+set[i].id+'" class="panel-collapse collapse"><div class="panel-body">'+set[i].body+'</div></div>';
	}   
	   //alert(data["id"]);
    $('#load_data').append(inp);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
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
 
});
</script>
