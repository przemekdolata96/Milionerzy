<?php 
	session_name("mysession"); 
	session_start();	
 ?>
<!DOCTYPE html>
<html lang="pl">

<head>



	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MILIONERZY</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="fontello-696ac1d6/css/fontello.css">
	<link href="https://fonts.googleapis.com/css?family=Space+Mono:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">

</head>

<body>
	
	<header>	
			<div class="header">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
					<img class="img-responsive" src="img/logo.png" alt="">
				</div>
	
				<!-- zmienic pozycje butonow   -->
					
				<div class="container ">
					<div  class="headdesk">
						<span id="startButton" >START</span>
						<span id="restartButton">RESTART</span>
						<?php if (!isset($_SESSION['login'])) { ?>
							<a href="login.php"><span id="loginButton">ZALOGUJ</span></a>
						<?php } ?>
						<?php if (isset($_SESSION['login'])) { ?>
							<a href="login.php"><span id="loginButton">WYLOGUJ</span></a>
						<?php } ?>
						<?php if (isset($_SESSION['login'])) { ?>
							<a href="insertquestion.php"><span id="loginButton">DODAJ PYTANIE</span></a>
						<?php } ?>
						<?php if (isset($_SESSION['login'])) { ?>
							<a href="results.php"><span id="loginButton">RANKING</span></a>
						<?php } ?>
					</div><!-- <div class="headdesk"><span id="startButton" onclick="insertQuestion(question,answerA,answerB,answerC,answerD)">START</span><span>RESTART</span></div> -->
				</div>
	
				<!-- <div class="container hidden-lg hidden-md hidden-sm ">
					<div class="headmobile">
						<div class="container">
							<br><br><span>START</span><br><br><span >RESTART</span>
						</div>
					</div>
				</div> -->
			</div>
	</header>
	
		<div class="container-fluid">
	
	
				<div id="badAnswerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Niestety to niepoprawna odpowiedz :(</h4>
				      </div>
				      <div class="modal-body">
				        <h4 id="endGameMessage"></h4>
				      </div>
				      <div class="modal-footer">
				        <button id="confirmRestartButton" type="button" class="btn btn-success" data-dismiss="modal">Jeszcze raz</button>
				        <button id="declineRestartButton" type="button" class="btn btn-danger" data-dismiss="modal">Zakoncz</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				<div id="restartModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Czy chcesz rozpocząć jeszcze raz?</h4>
				      </div>
				      <div class="modal-footer">
				        <button id="confirmRestartButton2" type="button" class="btn btn-success" data-dismiss="modal">Tak</button>
				        <button id="declineRestartButton2" type="button" class="btn btn-danger" data-dismiss="modal">Nie</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
	
				<div id="winModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 id="winInfo" class ="modal-title" id="gridSystemModalLabel">win</h4>
				      </div>
				      <div class="modal-footer">
				        <button id="confirmRestartButton2" type="button" class="btn btn-success" data-dismiss="modal">Dalej</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				
	
				<div id="fiftyfiftyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Czy chcesz wykorzystać koło ratunkowe 50:50?</h4>
				      </div>
				      <div class="modal-footer">
				        <button id="useFiftyFiftyBouy" type="button" class="btn btn-success" data-dismiss="modal">Tak</button>
				        <button id="" type="button" class="btn btn-danger" data-dismiss="modal">Nie</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				<div id="expertModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Czy chcesz skorzystać z podpowiedzi eksperta?</h4>
				      </div>
				      <div class="modal-footer">
				        <button id="useExpertBouy" type="button" class="btn btn-success" data-dismiss="modal">Tak</button>
				        <button id="" type="button" class="btn btn-danger"
				        data-dismiss="modal">Nie</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				<div id="expertModalShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Ekspert</h4>
				      </div>
				      <div class="modal-body">
				        <h4 id="expertAnswer"></h4>
				      </div>
				      <div class="modal-footer">
				        <button id="" type="button" class="btn btn-success" data-dismiss="modal">Schowaj</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				<div id="publicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Czy chcesz skorzystać z pomocy publiczności</h4>
				      </div>
				      <div class="modal-footer">
				        <button id="usePublicBouy" type="button" class="btn btn-success" data-dismiss="modal">Tak</button>
				        <button id="" type="button" class="btn btn-danger">Nie</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				<div id="publicModalShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Publiczność</h4>
				      </div>
				      <div class="modal-body">
				        <h4 id="publicA"></h4>
				        <h4 id="publicB"></h4>
				        <h4 id="publicC"></h4>
				        <h4 id="publicD"></h4>
				      </div>
				      <div class="modal-footer">
				        <button id="" type="button" class="btn btn-success" data-dismiss="modal">Schowaj</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
	
				<div id="resignModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class ="modal-title" id="gridSystemModalLabel">Czy na pewno chcesz zrezygnować </h4>
				      </div>
				      <div class="modal-footer">
				        <button id="resignConfirmation" type="button" class="btn btn-success" data-dismiss="modal">Tak</button>
				        <button id="resignDecline" type="button" class="btn btn-danger">Nie</button>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				
				<div class="row">
					<div id="questionContainer" class="container col-lg-9 col-md-9 col-sm-9 text-center">
					 		
	
	
							<div class="container leftSideHigh col-lg-9 col-md-9 col-sm-9">
					
								<div id="question" class="question">-</div>
							</div>
					
							<div class="container   col-lg-9 col-md-9 col-sm-9 text-center">
								<div onclick="" id="answerA" class="answer col-lg-5 col-md-5 col-sm-5 ">-</div>
								<div  class="col-lg-2 col-md-2 col-sm-2"></div>
								<div onclick="" id="answerB" class="answer col-lg-5 col-md-5 col-sm-5">-</div>
								<div onclick="" id="answerC" class="answer col-lg-5 col-md-5 col-sm-5">-</div>
								<div class="col-lg-2 col-md-2 col-sm-2"></div>
								<div onclick="" id="answerD" class="answer col-lg-5 col-md-5 col-sm-5">-</div>
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
										<div  id="fiftyfiftyBouy" onclick="#"  class="bouy col-lg-2 col-md-2 col-sm-2">50:50</div>
										<div class="col-lg-2 col-md-2 col-sm-2"></div>
										<div id="expertBouy" onclick="#" class="bouy col-lg-2 col-md-2 col-sm-2">
											<i class="icon-graduation-cap"></i>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2"></div>
										<div id="publicBouy" onclick="#" class="bouy col-lg-2 col-md-2 col-sm-2">
											<i class="icon-users"></i>
										</div>
										<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>	
							</div>
								
							<div class="won">
								<div id="price12" class="amount col-lg-12 col-md-12 col-sm-12">1.000.000</div>
								<div id="price11" class="amount col-lg-12 col-md-12 col-sm-12">500.000</div>
								<div id="price10" class="amount col-lg-12 col-md-12 col-sm-12">250.000</div>
								<div id="price9" class="amount col-lg-12 col-md-12 col-sm-12">125.000</div>
								<div id="price8" class="amount col-lg-12 col-md-12 col-sm-12">75.000</div>
								<div id="price7" class="amount col-lg-12 col-md-12 col-sm-12">40.000</div>
								<div id="price6" class="amount col-lg-12 col-md-12 col-sm-12">20.000</div>
								<div id="price5" class="amount col-lg-12 col-md-12 col-sm-12">10.000</div>
								<div id="price4" class="amount col-lg-12 col-md-12 col-sm-12">5.000</div>
								<div id="price3" class="amount col-lg-12 col-md-12 col-sm-12">2.000</div>
								<div id="price2" class="amount col-lg-12 col-md-12 col-sm-12">1.000</div>
								<div id="price1" class="amount col-lg-12 col-md-12 col-sm-12">500</div>
							</div>
						</div>
					
					</div>
				</div>	
		</div>
		<div class="container-fluid">
			<footer>
				<div class="row">
					<div class="footer">
						Milionerzy by Przemysław Dolata
					</div>
				</div>			
			</footer>
		</div>

	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="scripts.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>

</html>