var questionCounter=0;
var correctAnswer;

function insertQuestion(question,answerA,answerB,answerC,answerD)
{
	document.getElementById('question').innerHTML=question;
	document.getElementById('answerA').innerHTML=answerA;
	document.getElementById('answerB').innerHTML=answerB;
	document.getElementById('answerC').innerHTML=answerC;
	document.getElementById('answerD').innerHTML=answerD;
}

function getNextQuestion()
{

	$.ajax(
		{
			url:"download"+questionCounter+".php",
			type:"GET",
	
			success: function(data)
			{

				/*alert("Good JSON parsing");*/
				/*console.log(JSON.stringify(data));*/
				var obj = jQuery.parseJSON(data);
      			console.log(obj[0][0]);

      			insertQuestion(obj[0][1],obj[1][1],obj[2][1],obj[3][1],obj[4][1],)
      			correctAnswer=obj[5][1];
      			/*insertQuestion(obj.content,obj,aA,obj.aB,obj.aC,obj.aD);*/
      			/*console.log(data);*/
			},

			error: function(error)
			{
			alert("Error JSON parsing");

			console.log("parsing error");
			}
		});
		questionCounter++;

}

function restartGame()
{
	questionCounter=0;
	getNextQuestion();
	console.log('restart');
}


function checkAnswer(answer)
{
	if(answer==correctAnswer)
	{
		console.log("poprawna");
		getNextQuestion();
	}
	else
	{
		console.log("niepoprawna")
		$('#badAnswerModal').modal('show')

	}

}



$(document).ready(function()
{
	$("#restartButton").hide();

	$('#startButton').on('click touchstart',function()
	{
		/*$("startButton").prop('disabled', true);*/
		$("#restartButton").show();
		$("#startButton").hide();
		questionCounter=0;
		getNextQuestion();

	});


	$('#restartButton').on('click touchstart',function()
	{
		$('#restartModal').modal('show')

	});

	$('#confirmRestartButton').on('click touchstart',function()
	{
		restartGame();
		
	});

	$('#declineRestartButton').on('click touchstart',function()
	{
		$('#badAnswerModal').modal('hide')

	});


	$('#confirmRestartButton2').on('click touchstart',function()
	{
		restartGame();
		
	});

	$('#declineRestartButton2').on('click touchstart',function()
	{
		$('#restartModal').modal('hide')

	});



	$('#resign').on('click touchstart',function()
	{
		console.log('zrezygnowano')
		$('#resignModal').modal('show')

	});


	$('#fiftyfiftyBouy').on('click touchstart',function()
	{
		console.log('zrezygnowano')
		$('#fiftyfiftyModal').modal('show')

	});

	$('#expertBouy').on('click touchstart',function()
	{
		console.log('zrezygnowano')
		$('#expertModal').modal('show')

	});

	$('#publicBouy').on('click touchstart',function()
	{
		console.log('zrezygnowano')
		$('#publicModal').modal('show')

	});






});



//onClick 'start' startuje gre onClick restart restartuje gre, 
//po wystartowaniu biore pierwsze pytanie z bazy wkladam je do odpowiednich div
//po zaznaczeniu odpowiedzi wyskakuje okienko potwierdzenia jesli odpowiem tak
//to sprawdzam czy to poprawna odpowiedz jesli nie to wylaczam okienko ale nic nie zaznaczam
//jesli odpowiedz poprawna to zmieniam kolor diva z wygrana i przechodze do nastepnego pytania
