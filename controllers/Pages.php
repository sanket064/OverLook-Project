<?php

Class Pages extends Controller {

	public function __construct()
	{}

	public function main()
	{
		// later output into the template.php
		// $this->arrCats = Categories::getAll();	
		$this->nav = $this->loadView("mainnav");
		$this->mainbody .= $this->loadView("hero");

		// get products from db
		// $this->snippetTitle = Dictionary::get("featuredTitle","en");
		// $this->arrFeatured = Products::getFeatured();
		// $this->mainbody .= $this->loadView("productgrid");
		$this->mainbody .= $this->loadView("userLogin");	
		
		include("views/template.php");
	}


	public function dashboard()
	{
		$this->nav = $this->loadView("mainnav");
		$this->mainbody .= $this->loadView("hero_dashboard");
		
		include("views/template.php");
	}

	public function productsInCat()
	{
		// output data into template.php
		// $this->arrCat = Category::get($_GET["cat"]); // load my cat object
		// $this->arrCats = Categories::getAll();	
		// $this->nav = $this->loadView("mainnav");

		// $this->arrProducts = Products::getInCat($_GET["cat"]);
		// $this->mainbody .= $this->loadView("productgridall");
		// $this->arrComments = Comments::createComment();
			
		// include("views/template.php");
	}

	public function registerUser() {
		
		$this->arrCats = Categories::getAll();
		$this->nav = $this->loadView("mainnav");
		
		$this->mainbody .= $this->loadView("register");
			
		include("views/template.php");
	}

	public function search() {

		$this->mainbody .= $this->loadView("search");
	}



}

?>