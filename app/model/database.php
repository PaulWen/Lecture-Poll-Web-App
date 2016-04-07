<?php

class database extends abstract_data_object{
	
	function __construct(){
		
	}
		
	// create a db
	function create_db(){
		$sql = "CREATE DATABASE " . parent::DATABASE;
		
		if(parent::setup_db($sql)){
			echo "Database created successfully";
		} else {
			echo "Error creating database: " . mysqli_error(parent::$databaseConnection);
		}
	}
	
	
	// Create tables
	function create_tables(){
		
		//create table_poll
		$sql_table_poll= "CREATE TABLE " . parent::TABLE_POLL . " ( " . parent::COLUMN_TEACHER_POLL_CODE . " VARCHAR(20) NOT NULL ," . parent::COLUMN_STUDENT_POLL_CODE . " VARCHAR(20) NOT NULL ," . parent::COLUMN_NAME . " VARCHAR(50) NOT NULL , CONSTRAINT pk_poll_id PRIMARY KEY (" . parent::COLUMN_TEACHER_POLL_CODE . "," . parent::COLUMN_STUDENT_POLL_CODE ."))"; 
	
		if(parent::setup_db($sql_table_poll)){
			echo "Table table_poll created successfully";
		} else {
			echo "Error creating table: " . mysqli_errno(parent::$databaseConnection);
		}
		
		//create table_student_voting
		$sql_table_student_voting = "CREATE TABLE " . parent::TABLE_STUDENT_VOTING . " (" . parent::COLUMN_STUDENT_ID . "VARCHAR (20) NOT NULL, " . parent::COLUMN_STUDENT_POLL_CODE . ", VARCHAR (20) NOT NULL, " . parent::COLUMN_RATING . " INT NOT NULL, datetime TIMESTAMP )";
		
		if(parent::setup_db($sql_table_student_voting)){
			echo "Table table_student_voting created successfully";
		} else {
			echo "Error creating table: " . mysqli_errno(parent::$databaseConnection);
		}
	}
	
	
}
	
	
	 
		
	
	
	
	
	
	