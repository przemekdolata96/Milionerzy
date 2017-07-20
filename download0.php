<?php 
	header("application/json; charset=utf-8");
	require_once("dbconnect.php");

	$random=rand(0,4);//second parameter is depends on nuber of question in DB
	$query_container="SELECT * FROM pytania WHERE questionNumber=0 AND random=$random";
	/*$query_add ="INSERT INTO pytania (question,answerA,answerB,answerC,answerD,correct,questionNumber,random) VALUES ('Na okładce FIFY 18 występuje?','Cristiano Ronaldo','Messi','Lewandowski','Ibrahimovic','a','1','3')";

//add to database ą ń
	if(mysqli_query($connection, $query_add)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute sql. " . mysqli_error($connection);
} */
	require_once("querytojson.php");
 ?>