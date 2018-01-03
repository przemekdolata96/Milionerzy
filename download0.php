<?php 
	header("application/json; charset=utf-8");
	require_once("dbconnect.php");
	$queryRandom="SELECT COUNT(id) FROM pytania WHERE questionNumber=0";
	$result=mysqli_query($connection,$queryRandom);
	$resultString = mysqli_fetch_assoc($result);
	$questionOnLevelNumber=(int)implode($resultString);

	$random=rand(0,$questionOnLevelNumber-1);//second parameter is depends on nuber of question in DB
	$query_container="SELECT * FROM pytania WHERE questionNumber=0 AND random=$random";
	/*$query_add ="INSERT INTO pytania2 (question,answerA,answerB,answerC,answerD,correct,questionNumber,random,idplayer) VALUES ('Na okładce FIFY 18 występuje?','Cristiano Ronaldo','Messi','Lewandowski','Ibrahimovic','a','1','2','1')";

//add to database ą ń
	if(mysqli_query($connection, $query_add)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute sql. " . mysqli_error($connection);
} */
	require_once("querytojson.php");
 ?>