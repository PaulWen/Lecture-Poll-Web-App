<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Lecture Poll</title>

<!-- Bootstrap CSS -->
<link href="res/css/bootstrap.min.css" rel="stylesheet">

<!-- Own CSS -->
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

				<form class="form-horizontal" action="home/login" method="post">
					<div id="status_poll_code" class="form-group">
						<h3>
							<label for="inputPollCode"
								class="col-xs-offset-0 col-xs-8 subtitle fancy login"><span>Login</span></label>
						</h3>

						<div class="col-xs-offset-2 col-xs-7" style="margin-top:10px">
							<input type="text" class="form-control input-lg" id="poll_code"
								name="pollCode" placeholder="Student or Teacher Poll Code">
						</div>

						<div class="col-xs-offset-2 col-xs-7" style="margin-top:5px">
							<button id="login" type="submit"
								class="btn btn-primary btn-lg disabled">Login</button>
						</div>
					</div>
				</form>
				
				<form class="form-horizontal" style="margin-top:30px" action="home/createNewPoll"
					method="post">
					<div id="status_poll_name" class="form-group">
						<h3>
							<label for="inputPollName"
								class="col-xs-offset-0 col-xs-8 subtitle fancy create"><span>Create
									Poll</span></label>
						</h3>

						<div class="col-xs-offset-2 col-xs-7"style="margin-top:10px">
							<input type="text" class="form-control input-lg" id="poll_name"
								name="pollName" placeholder="Poll Name">
						</div>

						<div class="col-xs-offset-2 col-xs-7" style="margin-top:5px">
							<button id="create" type="submit"
								class="btn btn-success btn-lg disabled">Create</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
$(document).ready(function() {
    var poll_code_timer;    
    $("#poll_code").keyup(function (e){
        clearTimeout(poll_code_timer);
        var poll_code = $(this).val();
        poll_code_timer = setTimeout(function(){
            check_pull_code_ajax(poll_code);
        }, 500);
    }); 

    var login_timer;    
    $("#poll_name").keyup(function (e){
        clearTimeout(login_timer);
        var poll_name = $(this).val();
        login_timer = setTimeout(function(){
        	check_poll_name(poll_name);
        }, 250);
    }); 
});

function check_pull_code_ajax(poll_code){
    $.post('home/checkPollCode', {'pollCode':poll_code}, function(data) {
    	if (data == "true") {
			$("#status_poll_code").removeClass('has-error').addClass('has-success');
			$("#login").removeClass('disabled');
        } else {
			$("#status_poll_code").removeClass('has-success').addClass('has-error');
			$("#login").addClass('disabled');
        }
    });
}

function check_poll_name(poll_name){
	if (poll_name != "") {
		$("#status_poll_name").removeClass('has-error').addClass('has-success');
		$("#create").removeClass('disabled');
	} else {
		$("#status_poll_name").removeClass('has-success').addClass('has-error');
		$("#create").addClass('disabled');
    }
}
</script>
</html>