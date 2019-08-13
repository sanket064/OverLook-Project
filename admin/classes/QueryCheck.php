<?php
Class QueryCheck {
    public static function confirmQuery($result) {
        if(!$result) {
            // global $connection;
            die("Query Failed") . mysqli_error(ConnectToDb::con());
        }
        
    }

}

?>