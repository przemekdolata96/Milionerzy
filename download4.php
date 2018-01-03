<?php 
	header("application/json; charset=utf-8");

	require_once("dbconnect.php");
	$queryRandom="SELECT COUNT(id) FROM pytania WHERE questionNumber=4";
	$result=mysqli_query($connection,$queryRandom);
	$resultString = mysqli_fetch_assoc($result);
	$questionOnLevelNumber=(int)implode($resultString);

	$random=rand(0,$questionOnLevelNumber-1);//second parameter is depends on nuber of question in DB
	$query_container="SELECT * FROM pytania WHERE questionNumber=4 AND random=$random";
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