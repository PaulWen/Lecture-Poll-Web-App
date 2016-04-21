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
  	
 
    <div class="container">
     <div style="width:60%;" class="col-xs-offset-2">
       <div class="row">
       <br>
       		<h1 class="text-center col-xs-offset-1">C3003 Mo (11.04.)</h1>
      		<div class="col-xs-offset-5 col-xs-4">
      			<?php 
      			if(isset($_POST['rating'])){
      				$rating=$_POST['rating'];
      			}else{
      				$rating=1;
      			}
      			if($rating==1){
	       			echo '<img src="img/got_it.jpg" class="img-responsive" alt="I got it!">';
	    		} else {
	    			echo '<img src="img/lost.jpg" class="img-responsive" alt="I am lost">';
	    		}
	      		?> 
      		</div>
	 	</div>
	 <br>
     <div class="row">
     	<form method="post">
	      	<div class="col-xs-5 col-xs-offset-1">
	      		<input name="rating" type="hidden" value="1">
	      		<button type="submit" class="btn btn-success btn-lg btn-block">I got it!</button>
	      	</div>
     	</form>
     	<form method="post">
	      	<div class="col-xs-5 col-xs-offset-1">
	      	<input name="rating" type="hidden" value="0">
	      		<button type="submit" class="btn btn-danger btn-lg btn-block">I am lost!</button>
	      	</div>
     	</form>
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