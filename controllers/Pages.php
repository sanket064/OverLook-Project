<?php

Class Pages extends Controller {

	public function __construct()
	{}

	public function main()
	{
		$this->nav = $this->loadView("mainnav");
		$this->mainbody .= $this->loadView("hero");

		$this->mainbody .= $this->loadView("userLogin");	
		$this->mainbody .= $this->loadView("userRegistration");
		include("views/template.php");
	}


	public function dashboard()
	{
		$this->nav = $this->loadView("mainnav");
		$this->mainbody .= $this->loadView("hero_dashboard");
		$this->arrAssignments = Assignments::getAll();
		$this->arrAverageGrade = Assignments::averageGrade();
		$this->mainbody .= $this->loadView("average_grade");
		$this->mainbody .= $this->loadView("assignment_list");
		include("views/template.php");
	}

	public function registerUser() {
		
		$this->nav = $this->loadView("mainnav");
		$this->mainbody .= $this->loadView("register");	
		include("views/template.php");
	}

	public function search() {

		$this->mainbody .= $this->loadView("search");
	}



}

?>