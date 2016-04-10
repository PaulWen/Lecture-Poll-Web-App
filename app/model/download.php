<?php

//Output data in a file: data.csv

/*Add a button "Download" on Teacher's page
 * <style>
 * #download{
 * 	color: red;
 * 	background-color: aqua;
 * }
 * </style>
 *  <form action="download.php" method="post">
        <input id="download" type="submit" name="download" value="Download">
    </form>       
 */

class output_result extends abstract_data_object{
	
	public static function download(){
		
		// output headers so that the file is downloaded rather than displayed
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=data.csv');
		
		// create a file pointer connected to the output stream
		$output = fopen('php://output', 'w');
		
		// output the column headings
		fputcsv($output, array('Voter ID', 'Time', 'Rating'));
		
		//Extract data from db
		$sql_query = 'SELECT student_id, datetime, rating FROM student_voting';
		$records = parent::getMultipleRecords($sql_query);
		
		foreach($records as $row){		
			if($row['rating']=='0'){
				$row['rating'] = 'I got it';
			}else if ($row['rating' == '1']){
				$row['rating'] = 'I lost it';
			}else{
				$row['rating'] = 'undefined';
			}
			
			fputcsv($output,$row);
		}
	}
	
}
	//Run file when form submit
	if(isset($_POST['download'])) {
	
		output_result::download();
	}else{
		echo "can't reach this file";
	}
