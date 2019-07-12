<?php
// start session here because we can't start a session after outputting
session_start();


$_SESSION["arrCart"] = (isset($_SESSION["arrCart"]))? $_SESSION["arrCart"]:array();

// index.php?controller=products&action=featured
// index.php?controller=pages&action=main
// index.php?controller=pages 
include("../../overlookDB/ConnectToDB.php");
include("libs/Dictionary.php");
include("controllers/Controller.php");
include("models/Model.php");
// include("models/ShoppingCart.php");
// include("models/Products.php");
// include("models/Product.php");
// include("models/Categories.php");
// include("models/Category.php");
// include("models/Comments.php");
include("controllers/Pages.php");
// include("controllers/Cart.php");
include("controllers/User.php");

// Might want to check if controller/ action exists....
/// This is to check if we posted controller and action from the checkout form
if (isset($_POST["controller"]))
{
	$_GET["controller"] = $_POST["controller"];
}

if (isset($_POST["action"]))
{
	$_GET["action"] = $_POST["action"];
}

$controller = (!empty($_GET["controller"])) ? $_GET["controller"] : "pages";
$action = (!empty($_GET["action"])) ? $_GET["action"] : "main";



// creating a controller object dynamically be $controller variable Pages();
$controller = ucfirst($controller); // upper case first character of class name
$oCon = new $controller();

if (method_exists($oCon, $action))
{
	$oCon->$action();
} else {
	echo "action $action not found in $controller";
	die;
}
?>