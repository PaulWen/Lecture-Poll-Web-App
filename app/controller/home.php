<?php
class home extends abstract_controller {
	
	public function __construct(array $request_params) {
		// call super constructor
		parent::__construct ($request_params);
	}
	
	
	public function index() {
		$this->loadView("home");
	}
	
	public function authenticate($userType) {
		return true;
	}

	public function checkPollCode() {
		$pollListDataObject = new poll_list_data_object();
		if ($pollListDataObject->checkStudentPollCode($_POST["pollCode"]) || $pollListDataObject->checkTeacherPollCode($_POST["pollCode"])) {
			echo "true";
			$_SESSION["pollCode"] = $_POST["pollCode"];
		} else {
			echo "false";
		}
	}

	public function login() {
		$pollListDataObject = new poll_list_data_object();
		if ($pollListDataObject->checkStudentPollCode($_POST["pollCode"])) {
			$_SESSION["pollCode"] = $_POST["pollCode"];
			header("Location: " . DEFAULT_DOMAIN . "student");
		} else if ($pollListDataObject->checkTeacherPollCode($_POST["pollCode"])) {
			$_SESSION["pollCode"] = $_POST["pollCode"];
			header("Location: " . DEFAULT_DOMAIN . "teacher");
		} else {
			header("Location: " . DEFAULT_DOMAIN . DEFAULT_CONTROLLER);
		}
	}
	
	public function createNewPoll() {
		$pollListDataObject = new poll_list_data_object();
		
		// create new poll and log the teacher in
		$_SESSION["pollCode"] = $pollListDataObject->createNewPoll($_POST["pollName"]);
		
		header("Location: " . DEFAULT_DOMAIN . "teacher");
	}
}