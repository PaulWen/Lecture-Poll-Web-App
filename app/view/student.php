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
       <div class="row">
      	<div class="col-xs-12">
	      <h1 class="text-center">Please vote...</h1>
      	</div>
	 	</div>
     <div class="row">
     	<form onsubmit="$.post('student/rate', {'rating':0});" method="post">
	      	<div class="col-xs-5">
	      		<button type="submit" class="btn btn-success btn-lg btn-block">I got it!</button>
	      	</div>
     	</form>
     	<form onsubmit="$.post('student/rate', {'rating':1});" method="post">
	      	<div class="col-xs-5 col-xs-offset-2">
	      		<button type="submit" class="btn btn-danger btn-lg btn-block">I am lost!</button>
	      	</div>
     	</form>
     </div>
       <div class="row">
      	<div class="col-xs-12">
	      <h3 class="text-left">Poll Information</h3>
	      <p>
	      	Poll Name: <?php echo $poll_data->getPollName();?><br/>
	      	Student Poll Code: <?php echo $poll_data->getStudentPollCode();?>
	      </p>
      	</div>
	 	</div>
    </div>
  </body>
  
  <script type="text/javascript">

	function test() {
		alert("hey");
	}
		
  </script>
  
</html>