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
}