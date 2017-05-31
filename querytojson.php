<?php
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
	
	echo json_encode($data);
?>