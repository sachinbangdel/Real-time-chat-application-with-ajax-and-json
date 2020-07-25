<?php
session_start();
if(isset($_POST["id"])&&isset($_POST["upd"]))
{
    $ind=$_POST["id"];
    $_SESSION["data"][$ind]=array($_POST["upd"]);

}
else {echo "fuck";}
?>
<!DOCTYPE html>
<html>
<head>
    <title>update</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<body>
<form class="form form-inline">
    <div class="form-group">
        <input type="text" id="msg" placeholder="edit here" class="from-control"/>
        <button onclick="upt()" class="btn btn-primary">SUBMIT</button>
    </div>
</form>
<script type="text/javascript">
    function upt() {
        var ind=location.href;
        ind=ind.slice(-1);
        var value=$("#msg").val();
        $.post("http://localhost/chat/update.php",{id:ind,upd:value},function(data) {
                location.assign("http://localhost/chat/");
        });
    }
</script>
</body>
</html>