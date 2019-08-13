<?php

Abstract Class Controller
{
	var $mainbody;

	// FORCE CHILD CONTROLLERS TO HAVE THE METHOD MAIN
	abstract public function main();

	public function loadView($viewName)
	{
		ob_start();
		include("views/$viewName".".php");
		$html = ob_get_contents();
		ob_clean();

		return $html;

	}
}

?>