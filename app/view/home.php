<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Lecture Poll</title>

<!-- Bootstrap -->
<link href="res/css/bootstrap.min.css" rel="stylesheet">
<link href="res/css/stylesheet.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="res/js/bootstrap.min.js"></script>

</head>


<body>
	<br>
	<br>

	<div class="container">
	<div class="panel col-xs-offset-3 col-xs-8">
	<div class="form-panel">
	<br>
		<h1 class="text-center">Welcome to the Lecture Poll!</h1>
	<br>
	
	<form class="form-horizontal" action="home/createNewPoll" method="post">
  		<div class="form-group">
    		<h3><label for="inputPollCode" class="col-xs-offset-0 col-xs-8 subtitle fancy login"><span>Login</span></label></h3>
    	
    		<div class="col-xs-offset-2 col-xs-7">
      			<input type="text" class="form-control input-lg" id="inputPollCode" placeholder="Student or Teacher Poll code">
    		</div>
    
  		</div>
  
  		<div class="form-group">
    		<div class="col-xs-offset-2 col-xs-7">
      			<button type="submit" class="btn btn-primary btn-lg">Login</button>
    		</div>
 		</div>
 	</form>
 	<form class="form-horizontal" action="home/login" method="post">
  
  		<div class="form-group">
    		<h3><label for="inputPollName" class="col-xs-offset-0 col-xs-8 subtitle fancy create"><span>Create Poll</span></label></h3>
    		
    		<div class="col-xs-offset-2 col-xs-7">
      			<input type="text" class="form-control input-lg" id="inputPollName" placeholder="Poll Name">
    		</div>
  		</div>
  
  		<div class="form-group">
    		<div class="col-xs-offset-2 col-xs-7">
     	 		<button type="submit" class="btn btn-success btn-lg">Create</button>
    		</div>
  		</div>

 	</form>
 	</div>
  </div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#poll_code").keyup(function (e){
        clearTimeout(x_timer);
        var poll_code = $(this).val();
        x_timer = setTimeout(function(){
            check_pull_code_ajax(poll_code);
        }, 1000);
    }); 

function check_pull_code_ajax(poll_code){
    $.post('home/checkPollCode', {'pollCode':poll_code}, function(data) {
    	if (data == "true") {
			$("#status").removeClass('has-error').addClass('has-success');
			$("#login").removeClass('disabled');
        } else {
			$("#status").removeClass('has-success').addClass('has-error');
			$("#login").addClass('disabled');
        }
    });
}
});
</script>
</html>