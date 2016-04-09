<?php
class student extends abstract_controller {
	
	public function __construct(array $request_params) {
		// call super constructor
		parent::__construct ($request_params);
	}
	
	
	public function index() {
		$this->loadView("student");
	}
	
	public function authenticate($userType) {
		if ($userType == abstract_data_object::STUDENT_USERTYPE) {
			return true;
		} else {
			return false;
		}
	}
	
	public function rate() {
		$ratingList = new rating_list_data_object();
		
		if (isset($_SESSION["studentId"])) {
			$ratingList->createNewRating($_SESSION["studentId"], $_SESSION["pollCode"], $_POST["rating"]);			
		} else {
			alert();
			$_SESSION["studentId"] = $ratingList->createNewRating(null, $_SESSION["pollCode"], $_POST["rating"]);			
		}
		
	}
}