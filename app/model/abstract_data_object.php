<?php
/**
 * The main model which provides a connection to the database.
 * Each DataObject is required to extend from this class.
 */

abstract class abstract_data_object {
	
// Declare Constants	
	const HOST_IP='localhost';
	const PORT='3306';
	const USERNAME='root';
	const PASSWORD ='';
	
	const DATABASE ='lecture_poll_web_app';
	const TABLE_POLL ='poll';
	const TABLE_STUDENT_VOTING ='student_voting';
	const COLUMN_STUDENT_ID ='student_id';
	const COLUMN_NAME ='name';
	const COLUMN_TEACHER_POLL_CODE ='teacher_poll_code';
	const COLUMN_STUDENT_POLL_CODE ='student_poll_code';
	const COLUMN_DATETIME ='datetime';
	const COLUMN_RATING ='rating';

	const TEACHER_USERTYPE = 2;
	const STUDENT_USERTYPE = 1;
	const UNKOWN_USERTYPE = 0;
	
// Methods
	protected static $databaseConnection;
	
	protected static function hasConnection() {
		if (self::$databaseConnection) {
			return true;
		} else {
			self::$databaseConnection = mysqli_connect(self::HOST_IP, self::USERNAME, self::PASSWORD, self::DATABASE, self::PORT);
				
			$sql = "SET character_set_results = 'utf8',
			  character_set_client = 'utf8',
			  character_set_connection = 'utf8',
			  character_set_database = 'utf8',
			  character_set_server = 'utf8'";
			mysqli_query(self::$databaseConnection, $sql);
			if (!self::$databaseConnection) {
				return false;
			} else {
				return true;
			}
		}
	}
	
	protected static function getSingleValue($sql) {
		if (!self::hasConnection()) return;
		
		$query = mysqli_query(self::$databaseConnection, $sql);
		$data = mysqli_fetch_array($query);
		
		if ($data != null) {
			$result = array_pop($data); //Return the last value of an array
		} else {
			$result = null;
		}
		
		return $result;
	}
	
	
	protected static function getMultipleRecords($sql) {
		if (!self::hasConnection()) return; //if hasConnection is false, return immediately
		
		$result = mysqli_query(self::$databaseConnection, $sql);
					
		$i = 0;
		$records = array();
		while($record = mysqli_fetch_array($result, MYSQLI_NUM)) {
			$records[$i] = $record;
			$i++;
		}
		
		return $records;
	}
	
	protected static function insertRecord($sql) {
		if (!self::hasConnection()) return;
		
		mysqli_query(self::$databaseConnection, $sql);
	}
	
	protected static function randomCode($length){
		$charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$result = '';

		for ($i = 0; $i < $length; $i++) {
			$randomNumber = floor(mt_rand() % strlen($charset));
			$result = $result . substr($charset, $randomNumber, 1);
		}
		
		return $result;
	}	
	
	protected static function setup_db($sql){
		if(!self::hasConnection())	return;
		mysqli_query(self::$databaseConnection, $sql);
	}
}

?>