<?php 
	header("application/json; charset=utf-8");

	require_once("dbconnect.php");

	$query_container="SELECT * FROM pytania WHERE questionNumber=7";
	/*$query_add="INSERT INTO pytania (question,answerA,answerB,answerC,answerD,correct) VALUES ('Najlepszy język programowania to:','Java','C++','Python','C#','a')";
*/
//add to database
/*	if(mysqli_query($connection, $query_add)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute sql. " . mysqli_error($connection);
}*/ 
	require_once("querytojson.php");
 ?>