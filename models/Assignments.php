<?php
Class Assignments extends Model {

   
	public static function getAll()
	{
		
		$results = mysqli_query(ConnectToDb::con(), "SELECT * FROM assignments");

		while($record = mysqli_fetch_assoc($results))
		{
			// create a product object here...
			$arrAssignments[] = $record;
			//print_r($record);
		}
		// randomize our array of products
		
		return $arrAssignments;


    }
    
    public static function averageGrade() {
        $results = mysqli_query(ConnectToDb::con(), "SELECT AVG(assignment_marks) FROM assignments");

		$arrAverageGrade = mysqli_fetch_assoc($results);
		// print_r($arrAverageGrade);
		return $arrAverageGrade;

        
    }
} 


?>