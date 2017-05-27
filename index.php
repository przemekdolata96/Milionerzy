<!DOCTYPE html>
<html lang="pl">

	<?php
		
	?>
	
	<script type="text/javascript">
		
	</script>
<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MILIONERZY</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="fontello-696ac1d6/css/fontello.css">
	<link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&amp;subset=latin-ext" rel="stylesheet">

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="scripts.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	

</head>

<body>

<header>	
		<div class="header">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<img class="img-responsive" src="img/logo.png" alt="">
			</div>
				
			<div class="container hidden-xs">
				<div class="headdesk"><span id="startButton" >START</span><span>RESTART</span></div><!-- <div class="headdesk"><span id="startButton" onclick="insertQuestion(question,answerA,answerB,answerC,answerD)">START</span><span>RESTART</span></div> -->
			</div>

			<div class="container hidden-lg hidden-md hidden-sm ">
				<div class="headmobile">
					<div class="container">
						<br><br><span>START</span><br><br><span>RESTART</span>
					</div>
				</div>
			</div>
		</div>
</header>

	<div class="container-fluid">
			
			<div class="row">
				<div class="container col-lg-9 col-md-9 col-sm-9 text-center">
				 		


						<div class="container leftSideHigh col-lg-9 col-md-9 col-sm-9">
				
							<div id="question" class="question">

								
							</div>
						</div>
				
						<div class="container   col-lg-9 col-md-9 col-sm-9 text-center">
							<div id="answerA" class="answer col-lg-5 col-md-5 col-sm-5 ">A: FC Barcelona</div>
							<div  class="col-lg-2 col-md-2 col-sm-2"></div>
							<div id="answerB" class="answer col-lg-5 col-md-5 col-sm-5">B: Real Madryt</div>
							<div id="answerC" class="answer col-lg-5 col-md-5 col-sm-5">C: Bayern Monachium</div>
							<div class="col-lg-2 col-md-2 col-sm-2"></div>
							<div id="answerD" class="answer col-lg-5 col-md-5 col-sm-5">D: Legia Warszawa</div>
						</div>
					
				</div>
						
						<!-- sidebar ponizej ukryc w wersji xs a dodac go ponizej  -->
				<div class="container rightSideHigh text-center col-lg-3 col-md-3 col-sm-3">
					
					<div class="sidebar">
				
						<div id="resign">
							Zrezygnuj
						</div>
							
						<div class="lifebouys">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
									<div class="bouy col-lg-2 col-md-2 col-sm-2">50:50</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
									<div class="bouy col-lg-2 col-md-2 col-sm-2">
										<i class="icon-graduation-cap"></i>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
									<div class="bouy col-lg-2 col-md-2 col-sm-2">
										<i class="icon-users"></i>
									</div>
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>	
						</div>
							
						<div class="won">
							<div class="amount col-lg-12 col-md-12 col-sm-12">1.000.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">500.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">250.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">125.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">75.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">40.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">20.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">10.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">5.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">2.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">1.000</div>
							<div class="amount col-lg-12 col-md-12 col-sm-12">500</div>
						</div>
					</div>
				
				</div>
			</div>	
	</div>
	<footer>
		<div class="row">
			<div class="footer text-center">
				Milionerzy by Przemysław Dolata
			</div>
			
		</div>			
	</footer>
</body>

</html>