<?php
class poll_list_data_object extends abstract_data_object {
	
	//It behaves as a Helper class involving pollCode: Teacher, Student, Name of poll
	 	
	function __construct() {
	}
	
	/**
	 * Tests if a specific code given is a teacher poll code. 
	 * Return true: if parameter passed is teacher_poll_code existing in the DB
	 * Return false: otherwise
	 */
	public function checkTeacherPollCode($pollCode) {
		$sql = "SELECT `" . parent::COLUMN_TEACHER_POLL_CODE . "` FROM `" . parent::TABLE_POLL . "` WHERE `" . parent::COLUMN_TEACHER_POLL_CODE . "` = '$pollCode'";
		
		$result = parent::getSingleValue($sql);
		
		if ($result != null) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Tests if a specific code given is a student poll code. 
	 * Return true: if parameter passed is student_poll_code existing in the DB
	 * Return false: otherwise
	 */
	public function checkStudentPollCode($pollCode) {
		$sql = "SELECT `" . parent::COLUMN_STUDENT_POLL_CODE . "` FROM `" . parent::TABLE_POLL . "` WHERE `" . parent::COLUMN_STUDENT_POLL_CODE . "` = '$pollCode'";
		
		$result = parent::getSingleValue($sql);
		
		if ($result != null) {
			return true;
		} else {
			return false;
		}
	}

	/*
	 * Creates a new poll with given name and saves it to the database.
	 * Return unique teacherPollCode,
	 * which is used to retrieve all associated data: studentPollCode, pollName, #studentGot, #studentLost
	 */
	
	public function createNewPoll($pollName) {
		// create random codes that do not already exist
		$studentPollCode = parent::randomCode(5); //Default 5-character code
		while ($this->checkStudentPollCode($studentPollCode) || $this->checkTeacherPollCode($studentPollCode)) {
			$studentPollCode = parent::randomCode(5);
		}
		
		// Teacher code must be different from Student code, and existing codes in DB
		$teacherPollCode = parent::randomCode(5);
		while (strcmp($studentPollCode , $teacherPollCode) == 0 || $this->checkStudentPollCode($teacherPollCode) || $this->checkTeacherPollCode($teacherPollCode)) {
			$teacherPollCode = parent::randomCode(5);
		}
		
		// add new poll to the database
		$sql = "INSERT INTO `" . parent::TABLE_POLL . "` (`" . parent::COLUMN_TEACHER_POLL_CODE . "`, `" . parent::COLUMN_STUDENT_POLL_CODE . "`, `" . parent::COLUMN_NAME . "`) VALUES ('$teacherPollCode', '$studentPollCode', '$pollName')";
		parent::insertRecord($sql);
		
		// return the teacher poll code of the just created poll
		return $teacherPollCode;
	}
	
	
}