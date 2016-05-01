<?php
class teacher extends abstract_controller {
	
	public function __construct(array $request_params) {
		// call super constructor
		parent::__construct ($request_params);
	}
	
	
	public function index() {
		$this->loadView("teacher");
	}
	
	public function authenticate($userType) {
		if ($userType == abstract_data_object::TEACHER_USERTYPE) {
			return true;
		} else {
			return false;
		}
	}
	
	public function downloadCsvFile() {
		$poll_data = new poll_data_object ( $_SESSION ["pollCode"] );
		$poll_data->downloadResult();
	}

	public function data() {
		$poll_data = new poll_data_object ( $_SESSION ["pollCode"] );
		
		echo $poll_data->getNumberOfStudentsGotIt() . "," . $poll_data->getNumberOfStudentsLost();
	}
}