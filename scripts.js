var questionCounter=0;
var correctAnswer;
var price=0;
var fiftyfiftyBouyUsed=0;
var incorrectAnswerFromFifty="X";
var nonUsedBouys=[true,true,true];
var endGameMessage='';

function insertQuestion(question,answerA,answerB,answerC,answerD)
{
	setAnswerButtons("#","#","#","#");
	unbindBouysAndResignButton();
	document.getElementById('question').innerHTML="Za chwile zobaczysz pytanie...";
	document.getElementById('answerA').innerHTML="-";
	document.getElementById('answerB').innerHTML="-";
	document.getElementById('answerC').innerHTML="-";
	document.getElementById('answerD').innerHTML="-";

	setTimeout(function(){
		document.getElementById('question').innerHTML=question;
	},1000);
	setTimeout(function(){
		document.getElementById('answerA').innerHTML=answerA;
	},1700);
	setTimeout(function(){
		document.getElementById('answerB').innerHTML=answerB;
	},2400);
	setTimeout(function(){
		document.getElementById('answerC').innerHTML=answerC;
	},3100);
	setTimeout(function(){
		document.getElementById('answerD').innerHTML=answerD;
		//bind bouys buttons
	if(nonUsedBouys[0]){
			$('#fiftyfiftyBouy').on('click touchstart',function()
		{
			$('#fiftyfiftyModal').modal('show')

		});
	}
	if(nonUsedBouys[1]){
			$('#expertBouy').on('click touchstart',function()
		{
			$('#expertModal').modal('show')

		});
	}
	if(nonUsedBouys[2]){
			$('#publicBouy').on('click touchstart',function()
		{
			$('#publicModal').modal('show')

		});
	}
	$('#resign').on('click touchstart',function()
	{
		$('#resignModal').modal('show')

	});
	setAnswerButtons("checkAnswer('a')","checkAnswer('b')","checkAnswer('c')","checkAnswer('d')");
	},3800);
}

function getNextQuestion()
{	
	if(correctAnswer!=undefined)
	{
		$('#answer'+correctAnswer.toUpperCase()).attr("class","answer col-lg-5 col-md-5 col-sm-5")
	}

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
	$('#answerA').attr("class","answer col-lg-5 col-md-5 col-sm-5")
	$('#answerB').attr("class","answer col-lg-5 col-md-5 col-sm-5")
	$('#answerC').attr("class","answer col-lg-5 col-md-5 col-sm-5")
	$('#answerD').attr("class","answer col-lg-5 col-md-5 col-sm-5")
	questionCounter=0;
	correctAnswer="";
	price=0;
	for (var i =1; i < 13; i++) {
		var priceVar='price'+i;
		document.getElementById(priceVar).style.color = "white"
	}
	getNextQuestion();
	setButtonEndGame("checkAnswer('a')","checkAnswer('b')","checkAnswer('c')","checkAnswer('d')");
	bindBouysAndResignButton();
	document.getElementById("fiftyfiftyBouy").removeAttribute("style");
	document.getElementById("expertBouy").removeAttribute("style");
	document.getElementById("publicBouy").removeAttribute("style");

	console.log('restart');
}

function unbindBouysAndResignButton()
{
	$('#fiftyfiftyBouy').unbind('click');
	$('#expertBouy').unbind('click');
	$('#publicBouy').unbind('click');
	$('#resign').unbind('click');

}

function bindBouysAndResignButton()
{
	$('#fiftyfiftyBouy').on('click touchstart',function()
	{
		$('#fiftyfiftyModal').modal('show')

	});

	$('#expertBouy').on('click touchstart',function()
	{
		$('#expertModal').modal('show')

	});

	$('#publicBouy').on('click touchstart',function()
	{
		$('#publicModal').modal('show')

	});

	$('#resign').on('click touchstart',function()
	{
		$('#resignModal').modal('show')

	});

}

function gameWin()
{
	document.getElementById('question').innerHTML="-";
	document.getElementById('answerA').innerHTML="-";
	document.getElementById('answerB').innerHTML="-";
	document.getElementById('answerC').innerHTML="-";
	document.getElementById('answerD').innerHTML="-";
	unbindBouysAndResignButton();
	setAnswerButtons("#","#","#","#");
	document.getElementById('winInfo').innerHTML='WYGRAŁEŚ MILION ZŁOTYCH GRATULACJE!!!';
	setTimeout(function(){
			$('#winModal').modal('show')
	},500);
}

function setAnswerButtons(a,b,c,d)
{
	$('#answerA').attr("onclick",a)
	$('#answerB').attr("onclick",b)
	$('#answerC').attr("onclick",c)
	$('#answerD').attr("onclick",d)
}

function setButtonEndGame(a,b,c,d)
{
	setAnswerButtons(a,b,c,d);
	if(a=="#")
	{
		unbindBouysAndResignButton();
	}
}


function checkAnswer(answer)
{
	if(answer==correctAnswer)
	{
		if(questionCounter==2){
			endGameMessage='Wygrales 1000zł Gratulacje!!!';
		}
		else if(questionCounter==7)
		{
			endGameMessage='Wygrales 40.000zł Gratulacje!!!';
		}
		else
		{
			endGameMessage='Niestety nic nie udało Ci się wygrać';
		}
		var orange=setInterval(function(){ 
			$('#answer'+correctAnswer.toUpperCase()).attr("class","answerhover col-lg-5 col-md-5 col-sm-5") },
			 100);
		var green=setInterval(function(){ 
			$('#answer'+correctAnswer.toUpperCase()).attr("class","goodanswer col-lg-5 col-md-5 col-sm-5") },
			 200);
		setTimeout(function(){
			clearInterval(orange);
			clearInterval(green);
			console.log("poprawna");
			var priceVar='price'+questionCounter;
			document.getElementById(priceVar).style.color = "yellow"
			price = document.getElementById(priceVar).textContent;
			console.log(price);
			setAnswerButtons("checkAnswer('a')","checkAnswer('b')","checkAnswer('c')","checkAnswer('d')");//set onclick after use fiftyfityBouy
			if(price=='1.000.000')
			{
				gameWin();
				return true;
			}
		},1000);
		
		setTimeout(function(){
			getNextQuestion();
		},2000);
	}
	else
	{
		document.getElementById('endGameMessage').innerHTML=endGameMessage;
		var orange=setInterval(function(){ 
			$('#answer'+answer.toUpperCase()).attr("class","answerhover col-lg-5 col-md-5 col-sm-5") },
			 100);
		var green=setInterval(function(){ 
			$('#answer'+answer.toUpperCase()).attr("class","goodanswer col-lg-5 col-md-5 col-sm-5") },
			 200);
		setTimeout(function(){
			clearInterval(orange);
			clearInterval(green);
			$('#answer'+answer.toUpperCase()).attr("class","answerhover col-lg-5 col-md-5 col-sm-5")
		},1000);
		setTimeout(function(){
			console.log("niepoprawna")
			$('#badAnswerModal').modal('show')
			setButtonEndGame("#","#","#","#");
		},2000);
	}

}

function useBouy(bouyDivId,bouyModalToHide,bouyModalToShow){
	$('#'+bouyDivId).unbind('click');
			var anchor=document.getElementById(bouyDivId);
			var att=document.createAttribute("style");
			att.value="border-color: red;";
			anchor.setAttributeNode(att);
		
			$('#'+bouyModalToHide).modal('hide')
			setTimeout(function(){
			$('#'+bouyModalToShow).modal('show')
			},500);
}



$(document).ready(function()
{	

	$("#restartButton").hide();
	unbindBouysAndResignButton();
	

	$('#startButton').on('click touchstart',function()
	{
		/*$("startButton").prop('disabled', true);*/
		setAnswerButtons("checkAnswer('a')","checkAnswer('b')","checkAnswer('c')","checkAnswer('d')");
		$("#restartButton").show();
		$("#startButton").hide();
		questionCounter=0;
		getNextQuestion();
		bindBouysAndResignButton();

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
		$('#badAnswerModal').modal('hide');
	});


	$('#confirmRestartButton2').on('click touchstart',function()
	{
		restartGame();
		
	});

	$('#declineRestartButton2').on('click touchstart',function()
	{
		$('#restartModal').modal('hide')

	});

	

	$('#useFiftyFiftyBouy').on('click touchstart',function()
	{
		nonUsedBouys[0]=false;
		var answers=["a","b","c","d"];
		/*console.log(answers.remove(correctAnswer));*/
		answers.remove(correctAnswer);
		console.log(answers);

		var item1 = answers[Math.floor(Math.random()*answers.length)];
		console.log(item1);
		answers.remove(item1);
		console.log(answers);
		var item2 = answers[Math.floor(Math.random()*answers.length)];
		answers.remove(item2);
		incorrectAnswerFromFifty=answers[0];
		console.log(item2);
		item1=item1.toUpperCase();
		item2=item2.toUpperCase();
		console.log(item1);
		console.log(item2);

		document.getElementById('answer'+item1).innerHTML='-';
		document.getElementById('answer'+item2).innerHTML='-';

		$('#answer'+item1).attr("onclick","#")
		$('#answer'+item2).attr("onclick","#")////poprawic - naprawic onclick

		$('#fiftyfiftyBouy').unbind('click');
		var anchor=document.getElementById('fiftyfiftyBouy');
		var att=document.createAttribute("style");
		att.value="border-color: red;";
		anchor.setAttributeNode(att);
		
		$('#fiftyfiftyModal').modal('hide')
		fiftyfiftyBouyUsed=1;

	});

	$('#useExpertBouy').on('click touchstart',function()
	{
		nonUsedBouys[1]=false;
		if(fiftyfiftyBouyUsed==1){
			var correctPercent=Math.floor(Math.random()*65+35);
			
			var random= Math.floor(Math.random()*4);
			var expertAnswer="";
			if(random==3){
				expertAnswer=incorrectAnswerFromFifty.toUpperCase();
			}
			else{
				expertAnswer=correctAnswer.toUpperCase();
			}
			document.getElementById('expertAnswer').innerHTML="Mysle że poprawna odpowiedz to: "+expertAnswer;
			useBouy("expertBouy","expertModal","expertModalShow");

		}
		else{

			var answers=["a","b","c","d"];
			answers.remove(correctAnswer);
			var random= Math.floor(Math.random()*4);
			var expertAnswer="";
			if(random==3){
				expertAnswer=(answers[Math.floor(Math.random()*3)]).toUpperCase();
			}
			else{
				expertAnswer=correctAnswer.toUpperCase();
			}
			document.getElementById('expertAnswer').innerHTML="Mysle że poprawna odpowiedz to: "+expertAnswer;
			useBouy("expertBouy","expertModal","expertModalShow");
		}

	});

	$('#usePublicBouy').on('click touchstart',function()
	{	
		nonUsedBouys[2]=false;
		if(fiftyfiftyBouyUsed==1){
			var correctPercent=Math.floor(Math.random()*65+35);
			var answers=["a","b","c","d"];
			answers.remove(correctAnswer);
			answers.remove(incorrectAnswerFromFifty);

			document.getElementById('public'+correctAnswer.toUpperCase()).innerHTML="odpowiedz "+correctAnswer.toUpperCase()+": "+correctPercent+"%";
			document.getElementById('public'+incorrectAnswerFromFifty.toUpperCase()).innerHTML="odpowiedz "+incorrectAnswerFromFifty.toUpperCase()+": "+(100-correctPercent)+"%";
			document.getElementById('public'+answers[0].toUpperCase()).innerHTML="";
			document.getElementById('public'+answers[1].toUpperCase()).innerHTML="";

			useBouy("publicBouy","publicModal","publicModalShow");
		}
		else{
		var percentToDivide=100;
		var answers=["a","b","c","d"];
		var percent=[0,0,0,0];
		var container=0;
		
		var firstRand= Math.floor(Math.random()*3);
		console.log("firstRand: "+firstRand);

			//two algorithms for percent first is random second give always the biggest percent for good answer
		if(firstRand==1)
		{
			container=percentToDivide-Math.floor(Math.random()*percentToDivide);
			console.log(container);
			percent[0]=container;
			if(container<0)
			{
				container=0;
			}
			percentToDivide-=container;
			container=percentToDivide-Math.floor(Math.random()*percentToDivide);
			console.log(container);
			percent[1]=container;
			if(container<0)
			{
				container=0;
			}
			percentToDivide-=container;
			container=percentToDivide-Math.floor(Math.random()*percentToDivide);
			console.log(container);
			percent[2]=container;
			percentToDivide-=container;
			percent[3]=percentToDivide;

		}
		else
		{
			for (var i = answers.length - 1; i >= 0; i--) {
				if(answers[i]==correctAnswer)
				{
					percentToDivide-=Math.floor(Math.random()*50+50);
					percent[i]=100-percentToDivide;
				}
			}
			for (var x = percent.length - 1; x >= 0; x--) {
				var counter=0;
						(function(){
				          if(percent[x]==0)
				{
					if(counter==3){
						percent[x]=percentToDivide;
					}
					else{
					container=percentToDivide-Math.floor(Math.random()*percentToDivide);
					percentToDivide-=container;
					console.log(percentToDivide);
					percent[x]=container;
					}

				}
						})();
			}
			console.log("drugi algorytm");
		}
		

		document.getElementById('publicA').innerHTML="odpowiedz A: "+percent[0]+"%";
		document.getElementById('publicB').innerHTML="odpowiedz B: "+percent[1]+"%";
		document.getElementById('publicC').innerHTML="odpowiedz C: "+percent[2]+"%";
		document.getElementById('publicD').innerHTML="odpowiedz D: "+percent[3]+"%";

		useBouy("publicBouy","publicModal","publicModalShow");
		}
	});


	$('#resignConfirmation').on('click touchstart',function()
	{
		setButtonEndGame("#","#","#","#");
		$('#resignModal').modal('hide')
		if(price==0)
		{
			document.getElementById('winInfo').innerHTML='Niestety Twoja wygrana to 0zł :(';
		}
		else
		{
			document.getElementById('winInfo').innerHTML='Twoja wygrana to: '+price+'zł'+' GRATULACJE!!!';
		}
		setTimeout(function(){
			$('#winModal').modal('show')
			},500);
	});

	$('#resignDecline').on('click touchstart',function()
	{
		$('#resignModal').modal('hide')
		
	});

});


Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};



//onClick 'start' startuje gre onClick restart restartuje gre, 
//po wystartowaniu biore pierwsze pytanie z bazy wkladam je do odpowiednich div
//po zaznaczeniu odpowiedzi wyskakuje okienko potwierdzenia jesli odpowiem tak
//to sprawdzam czy to poprawna odpowiedz jesli nie to wylaczam okienko ale nic nie zaznaczam
//jesli odpowiedz poprawna to zmieniam kolor diva z wygrana i przechodze do nastepnego pytania
