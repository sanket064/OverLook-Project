<?php
//****************************************************************************************************************
// SECURE DATABASE CONNECTION // This will be outside the project folder in a separate file/folder
//****************************************************************************************************************/
// *********************** START OF ConnectToDB.php ***********************
Class ConnectToDB {
   var $connect;
   public function __construct($connect){
       $this->con = $connection;
   }
   public static function connect() {
       $conDetails = parse_ini_file("../config/config.ini"); // placed outside the www root folder so nobody can gain access to details
       $connect = mysqli_connect( $conDetails['server'], $conDetails['user'], $conDetails['pass'], $conDetails['db'] );
	   if(!$connect) {die('ERROR connecting to DB'.mysqli_connect_error());}
       return $connect;
   }
   public function query($sql){
       // all sql queries go through this function
       $result = mysqli_query($this->con, $sql);
       return $result;
   }
}
?>