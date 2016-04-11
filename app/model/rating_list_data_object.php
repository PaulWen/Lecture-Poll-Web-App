<?php

/* class handles student rating records, insertting to DB 
 */

class rating_list_data_object extends abstract_data_object {
	
	function __construct() {
	}

	/**
	 * Creates a new student rating record in the database.
	 * @param int $studentRating
	 */
	public function createNewRating($studentId, $pollCode, $studentRating) {
		// check if student already as an student id stored in the session data
		// If student hasn't been assigned an ID yet, create a new one
		if ($studentId == null) {
			$studentId = $this->createNewStudentId();
		}
		
		// add rating to the database
		$sql = "INSERT INTO `" . parent::TABLE_STUDENT_VOTING . "` (`" . parent::COLUMN_STUDENT_ID . "`, `" . parent::COLUMN_STUDENT_POLL_CODE . "`, `" . parent::COLUMN_RATING . "`) VALUES ('$studentId', '$pollCode', '$studentRating')";
		
		parent::insertRecord($sql);
		
		return $studentId;
	}
	
	
	private function createNewStudentId() {
		// if there is no student id yet, create one
		$studentId = parent::randomCode(5);
		while ($this->isStudentId($studentId)) {
			$studentId = parent::randomCode(5);
		}
		
		return $studentId;
	}
	
	private function isStudentId($studentId) {
		$sql = "SELECT `" . parent::COLUMN_STUDENT_ID . "` FROM `" . parent::TABLE_STUDENT_VOTING . "` WHERE `" . parent::COLUMN_STUDENT_ID . "` = '$studentId'";
	
		$result = parent::getSingleValue($sql);
		
		if ($result != null) {
			return true;
		} else {
			return false;
		}
	}
}