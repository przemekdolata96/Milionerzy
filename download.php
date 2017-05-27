<?php 
	header("application/json; charset=utf-8");

	require_once("dbconnect.php");

	$query_container="SELECT * FROM pytania WHERE questionNumber=0";
	$query_add="INSERT INTO pytania (question,answerA,answerB,answerC,answerD,correct) VALUES ('Najlepszy język programowania to:','Java','C++','Python','C#','a')";

//add to database
/*	if(mysqli_query($connection, $query_add)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute sql. " . mysqli_error($connection);
}*/ 


	$result=mysqli_query($connection,$query_container);

	$download_data=array();


		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$tresc = $row['question'];
		$odpa = $row['answerA'];
		$odpb = $row['answerB'];
		$odpc = $row['answerC'];
		$odpd = $row['answerD'];
		$odpp = $row['correct'];

		

		$data = array(['content', ''.$tresc], ['aA', $odpa], ['aB', $odpb], ['aB', $odpc], ['aB', $odpd], ['aB', $odpp]);
	
	while ($row=mysqli_fetch_assoc($result)) {
		$download_data[]=$row;
	}

	echo json_encode($data);


 ?>