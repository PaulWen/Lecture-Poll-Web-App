<?php

/* 
 * Responsibility: Restore data associated with $teacherPollCode: 
   Advantage of keeping only $teacherPollCode variable: Always get the most updated data from the DB
*/ 

class poll_data_object extends abstract_data_object {
	
	private $teacherPollCode;
	
	
	function __construct($pollCode) {
		
		// save TeacherPollCode		
		$pollListDataObject = new poll_list_data_object(); // Object helps check student_poll_code, and teacher_poll_code
		
		if ($pollListDataObject->checkStudentPollCode($pollCode)) {
			$sql = "SELECT " . parent::COLUMN_TEACHER_POLL_CODE . " FROM " . parent::TABLE_POLL . "
			WHERE " . parent::COLUMN_STUDENT_POLL_CODE . " = $pollCode";
		
			$this->teacherPollCode = parent::getSingleValue($sql);
			
		} else if ($pollListDataObject->checkTeacherPollCode($pollCode)) {
			$this->teacherPollCode = $pollCode;
		}
	}
	
	public function getPollName() {
		$sql = "SELECT " . parent::COLUMN_NAME . " FROM " . parent::TABLE_POLL . "
		WHERE " . parent::COLUMN_TEACHER_POLL_CODE . " = $this->teacherPollCode";
		
		return parent::getSingleValue($sql);
	}
	
	public function getNumberOfStudentsGotIt($student_poll_code) {
		$sql = "SELECT COUNT(" . parent::COLUMN_RATING . ") 
					FROM " . parent::TABLE_STUDENT_VOTING . " as student_voting1 
					JOIN
					(SELECT " . parent::COLUMN_STUDENT_ID . ", MAX(" . parent::COLUMN_DATETIME . ") as datetime  
						FROM " . parent::TABLE_STUDENT_VOTING . "
						WHERE student_poll_code = $student_poll_code 
						GROUP BY student_id ORDER BY datetime DESC) as student_voting2
						ON (student_voting1." . parent::COLUMN_STUDENT_ID . " = student_voting2." . parent::COLUMN_STUDENT_ID . " 
						AND student_voting1." . parent::COLUMN_DATETIME . " = student_voting2." . parent::COLUMN_DATETIME . ")
				WHERE " . parent::COLUMN_RATING . " = 0";
		
		return parent::getSingleValue($sql);
	}

	public function getNumberOfStudentsLost($student_poll_code) {
		$sql = "SELECT COUNT(" . parent::COLUMN_RATING . ") 
					FROM " . parent::TABLE_STUDENT_VOTING . " as student_voting1 
					JOIN
					(SELECT " . parent::COLUMN_STUDENT_ID . ", MAX(" . parent::COLUMN_DATETIME . ") as datetime  
						FROM " . parent::TABLE_STUDENT_VOTING . "
						WHERE student_poll_code = $student_poll_code GROUP BY student_id 
						ORDER BY datetime DESC) as student_voting2
						ON (student_voting1." . parent::COLUMN_STUDENT_ID . " = student_voting2." . parent::COLUMN_STUDENT_ID . "
						AND student_voting1." . parent::COLUMN_DATETIME . " = student_voting2." . parent::COLUMN_DATETIME . ")
				WHERE " . parent::COLUMN_RATING . " = 1";
		
		return parent::getSingleValue($sql);
	}
	
	public function getStudentPollCode() {
		$sql = "SELECT " . parent::COLUMN_STUDENT_POLL_CODE . " FROM " . parent::TABLE_POLL . "
				WHERE " . parent::COLUMN_TEACHER_POLL_CODE . " = $this->teacherPollCode";
	
		return parent::getSingleValue($sql);
	}
	
	public function getTeacherPollCode() {
		return $this->teacherPollCode;
	}
}