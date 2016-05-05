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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="res/js/bootstrap.min.js"></script>
  </head>
  
  <body>
  	<?php 
  		$poll_data = new poll_data_object($_SESSION["pollCode"]);
  	?>
 
    <div class="container">
     <div>
       <div class="row">
      		<div class="col-sm-12">
       <br>
      		</div>
      		</div>
       		<h1 class="text-center"><?php echo $poll_data->getPollName(); ?></h1>
       <div class="row">
      		<div class="col-sm-offset-4 col-sm-4">
      			<img id="current_status" src="res/img/happy_smiley.png" class="img-responsive" alt="I got it!">
      		</div>
	 	</div>
	 <br>
     <div class="row">
     	<form onsubmit="submit_rating(0); return false;">
	      	<div class="col-sm-5">
	      		<button type="submit" class="btn btn-success btn-lg btn-block">I got it!</button>
	      	</div>
     	</form>
     	<form onsubmit="submit_rating(1); return false;">
	      	<div class="col-sm-5 col-sm-offset-2">
	      		<button type="submit" class="btn btn-danger btn-lg btn-block">I am lost!</button>
	      	</div>
     	</form>
     </div>
    </div>
    </div>
  </body>
	<script type="text/javascript">
		$(document).ready(function() {
			submit_rating(0);
		});
		
		function submit_rating(value){
		    $.post('student/rate', {'rating':value});

		    if (value == 0) {
		    	$("#current_status").attr("src", "res/img/happy_smiley.png");
		    } else {
		    	$("#current_status").attr("src", "res/img/sad_smiley.png");
			}    
		}
	</script>
</html>

