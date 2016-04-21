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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
		$(function() {
			  $('#container').highcharts({
			    chart: {
			      type: 'bar'
			    },
			    title: {
			      text: 'Graph of Students Mood'
			    },
			    xAxis: {
			      categories: [""] 
			    },
			    yAxis: {
			      min: 0,
			      title: {
			        text: ''
			      }
			    },
			    legend: {
			      reversed: true
			    },
			    plotOptions: {
			      series: {
			        stacking: 'normal'
			      }
			    },
			    series: [{
			      name: 'I got it',
			      data: [10] 
			    }, {
			      name: 'I am lost',
			      data: [5] 
			    }]
			  });
			});

		</script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Teacher View for "<?php echo $poll_data->getPollName();?>"</h1>
			</div>
		</div>
		
	<p style="text-align:center; margin-top:5px; margin-bottom:15px;"> <img alt="Smile" src="smile.jpg"></p>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<div id="container" style="min-width: 310px; max-width: 800px; height: 350px; margin: 0 auto"></div><!-- display bar chart -->
	
	<hr style="border-width: 1px 1px 0; border-style:solid;	border-color:GREY; margin-top:1cm; margin-bottom:1cm; width:80%;">
	
	<?php 
		$poll_data = new poll_data_object($_SESSION["pollCode"]);
	?>
	
		<div class="row">
			<div class="col-xs-12">
				<p class="text-center">
				<button type="button" class="btn btn-info btn-lg" style="background-color:#2B547E; 
				border-color:#2B547E; width:40%;"
					data-toggle="modal" data-target="#myModal">Poll Codes</button>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<p class="text-center">
				<button type="button" class="btn btn-info btn-lg" style="background-color:#646D7E; 
			border-color:#646D7E; width:40%;">Download Data</button>
				</p>
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
		
		
						
		

	</div>
</body>

</html>