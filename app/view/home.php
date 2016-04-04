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
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Welcome to the Lecture Poll Web App!</h1>
			</div>
		</div>
		<div class="row">
			<form action="home/createNewPoll" method="post">
				<div class="col-xs-12">
					<input class="form-control input-lg" type="text" name="pollName"
						placeholder="Poll Name">
				</div>
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Start
						New Poll...</button>
				</div>
			</form>
		</div>
		<div class="row">
			<form action="home/login" method="post">
			 	<div id="status" class="form-group">
					<div class="col-xs-8">
							<input id="poll_code" class="form-control input-lg" type="text" name="pollCode"
								placeholder="Student- or Teacher-Code">
					</div>
					<div class="col-xs-4">
						<button id="login" type="submit" class="btn btn-primary btn-lg disabled">Login</button>
					</div>
				</div>
			</form>
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