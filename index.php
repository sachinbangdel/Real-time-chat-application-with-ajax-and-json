<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>chats</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<body>
	<script type="text/javascript">
		function lol(){
			var tem=new Date();
			tem=tem.getHours()+":"+tem.getMinutes();
		$.post("./forw.php",{name:$(".form #msg").val(),dates:tem},function(data) {

                $(".show").empty();
                $(".hide").show();
            });

		}
	
	</script>
 <form class="form form-inline">
 	<div class="d-flex flex-row bd-highlight">
 	<div class="form-group p-2 bd-highlight">
 		<div class="col-sm-10">
 		<input type="text" id="msg" name="msg" class="form-control" placeholder="message here">
 		</div>
 		
 	</div>
 	<div class="form-group p-2 bd-highlight">
 		<div class="col-sm-2">
 		<button type="submit" class="btn btn-dark" onclick="lol()">SUBMIT</button>
 	    </div>
 	</div>
        <div class="form-group p-2 bd-highlight">
            <div class="col-sm-2">
                <button class="btn btn-primary">
                    Messages<span class="badge badge-light"></span>
                </button>
            </div>
        </div>
 	</div>
 </form>

 <div class="show"></div>

 <script type="text/javascript">
 	$(document).ready(function(){
 		function getit(){
 			$.getJSON("forw.php",function(data){
 				var count=0;
                $(".hide").hide();
 				$(".show").empty();
				for(var i=0;i<data.length;i++){
				var temp=data[i];
				if(temp[0]!="null"&&temp[1]!="null"&&temp[0]!=""&&temp[1]!=""){
				    if(i%2==0){
				$(".show").append("<p class='bg-success'>"+temp[0]+"</br>"+temp[1]+"\n<a href='del.php?id="+i+"'>delete ths</a> <a href='update.php?id="+i+"'>Edit</a></p>\n\n");}
				    else{
                        $(".show").append("<p class='bg-info'>"+temp[0]+"</br>"+temp[1]+"\n<a href='del.php?id="+i+"'>delete ths</a> <a href='update.php?id="+i+"'>Edit</a></p>\n\n");
                    }
                count++;
				}}
				$(".badge").empty();
                $(".badge").append(count);
                count=0;
 			});
 			$.ajax({cache:false});
		}

		setInterval(function(){getit();},1000);
 	});

 </script>
</body>


</html>