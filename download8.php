<?php 
	header("application/json; charset=utf-8");

	require_once("dbconnect.php");

	$random=0;//second parameter is depends on nuber of question in DB
	$query_container="SELECT * FROM pytania WHERE questionNumber=8 AND random=$random";
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