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
	<?php 
		$poll_data = new poll_data_object($_SESSION["pollCode"]);
	?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Teacher View for "<?php echo $poll_data->getPollName();?>"</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h3 class="text-left">I got it!</h3>
				<p class="text-left"><?php echo $poll_data->getNumberOfStudentsGotIt(); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h3 class="text-left">I am lost!</h3>
				<p class="text-left"><?php echo $poll_data->getNumberOfStudentsLost(); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<button type="button" class="btn btn-info btn-lg"
					data-toggle="modal" data-target="#myModal">Poll Codes</button>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="text-center">Teacher Code</h3>
							<p class="text-center"><?php echo $poll_data->getTeacherPollCode(); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h3 class="text-center">Student Code</h3>
							<p class="text-center"><?php echo $poll_data->getStudentPollCode(); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Dont know how to link button click event with invoking function download -->
		<div class="row">
			<div class="col-xs-12">
				<form action= "" method="post">
					<button type="button" class="btn btn-info btn-lg" >Download</button>
				</form>
			</div>
		</div>
		
						
		<div class="row">
    	<form action="teacher" method="post">
	      	<div class="col-xs-12">
				<button type="submit" class="btn btn-primary btn-lg btn-block">Refresh</button>
		    </div>
   		</form>
      </div>

	</div>
</body>

</html>