/*var answerA="FC Barcelona";
var answerB="Real Madryt";
var answerC="Juventus Turyn";
var answerD="Atletico Madryt";
var question="W półfinale ligi mistrzów 2016 nie grała drużyna";*/
/*document.getElementById('answerA').style.fontSize='10px';*/

function insertQuestion(question,answerA,answerB,answerC,answerD)
{
	document.getElementById('question').innerHTML=question;
	document.getElementById('answerA').innerHTML=answerA;
	document.getElementById('answerB').innerHTML=answerB;
	document.getElementById('answerC').innerHTML=answerC;
	document.getElementById('answerD').innerHTML=answerD;
}

$(document).ready(function()
{
	$('#startButton').click(function()
	{
		$.ajax(
		{
			url:"download.php",
			type:"GET",
	
			success: function(data)
			{

				/*alert("Good JSON parsing");*/
				/*console.log(JSON.stringify(data));*/
				var obj = jQuery.parseJSON(data);
      			console.log(obj[0][0]);

      			insertQuestion(obj[0][1],obj[1][1],obj[2][1],obj[3][1],obj[4][1],)

      			/*insertQuestion(obj.content,obj,aA,obj.aB,obj.aC,obj.aD);*/
      			/*console.log(data);*/
			},

			error: function(error)
			{
			alert("Error JSON parsing");

			console.log("parsing error");
			}
		});
	});
});



//onClick 'start' startuje gre onClick restart restartuje gre, 
//po wystartowaniu biore pierwsze pytanie z bazy wkladam je do odpowiednich div
//po zaznaczeniu odpowiedzi wyskakuje okienko potwierdzenia jesli odpowiem tak
//to sprawdzam czy to poprawna odpowiedz jesli nie to wylaczam okienko ale nic nie zaznaczam
//jesli odpowiedz poprawna to zmieniam kolor diva z wygrana i przechodze do nastepnego pytania
