function Questions(question, choices, correctAnswer){
  this.question = question;
  this.choices = choices;
  this.correctAnswer = correctAnswer;
}
var Questions = [
  new Questions("What is the capitol of California",["Denver", "San Francisco", "Sacramento", "Washington D.C"],2),
  new Questions("What is the largest city in the world:",["Shanghai", "Los Angeles", "Beijing", "Delhi"],0),
  new Questions("A quincentenary is an anniversary of how many years?",[ "200", "600", "500", "1000"],2),
  new Questions("What is someone who shoes horses called?",[ "ferrier", "horse shoe", "man/women", "none of the above"],0),
  new Questions("Name the seventh planet from the sun:",[ "Mercury", "Venus", "Earth", "Uranus"],3),

];

var current = 0;
var correct = 0;

function setupOptions() {
  $('#question').html(parseInt(current) + 1 + ". " + Questions[current].question);
  var options = Questions[current].choices;
  var formHtml = '';
  for (var i = 0; i < options.length; i++) {
    formHtml += '<div><input type="radio" name="option" value="' + i + '" class="options"><label for="option' + i + '">' + options[i] + '</label></div><br/>';
  }
  $('#form').html(formHtml);
  $(".options:eq(0)").prop('checked', true);
}

function checkAns() {
  if ($("input[name=option]:checked").val() == Questions[current].correctAnswer) {
    correct++;
  }
}

$(document).ready(function(){
	
  var $jumbo = $(".jumbotron");
  var $start = $("#start");
  var $progress = $("#progressbar");
  var $next = $("#next");
  var $result = $("#result");
  
	$jumbo.hide();
	$start.click(function() {
	    $jumbo.fadeIn();
	    $(this).hide();
  	});

	$(function() {
		$progress.progressbar({
			max: Questions.length-1,			
			value: 0
		});
	});

	setupOptions();

	$next.click(function(){
			event.preventDefault();
			checkAns();
			current++;
			$(function() {
    			$progress.progressbar({
      				value: current
    			});
  			});
			if(current<Questions.length){
				setupOptions();
				if(current==Questions.length-1){
					$next.html("Submit");
					$next.click(function(){
					    var answer;
					    var finalA;
					    answer = correct / current;
					    finalA =  answer * 100;
					    var a = parseInt(finalA);
						$jumbo.hide();
						$result.html("You correctly answered " + correct + " out of " + current + " questions!\n" + "\nYou obtained " + a + "%").hide();
						$result.fadeIn(1500);
					});

				}
				
			};
	});	
});