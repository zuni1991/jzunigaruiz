    var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                    'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                    'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    var words = [{ word: "dog", hint: "It's a pet" }, 
                 { word: "apple", hint: "red fruit" }, 
                 { word: "pizza", hint: "I want a slice of" }];
    var selectedWord = "";
    var selectedHint = "";
    var board = [];
    var remainingGuesses = 6;


    window.onload = startGame();
    $("#letters").on("click", ".letter", function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
    
});
    $(".replayBtn").on("click", function() {
    location.reload();
});
    $("#hint").on("click", function(){
        $("#hint").hide();
        $("#word").append("<br />");
        $("#word").append("<span class='hints'>Hint: " + selectedHint + "</span>")
    
        remainingGuesses -= 1;
        updateMan();
        if (remainingGuesses <= 0) {
            endGame(false);
        }
    });


    function startGame() {
        pickWord();
        createLetters();
        initBoard();
        updateBoard();
        var pGuessed = document.querySelector('#prevGuesses');
        pGuessed.innerHTML = 'Previous Guesses: ';

    }
    function pickWord() {
        let randInt = Math.floor(Math.random() * words.length);
        selectedWord = words[randInt].word.toUpperCase();
        selectedHint = words[randInt].hint;
        
        $("#hint").append("<button class='btn btn-success letter'>HINT</button>");
    }
    function createLetters() {
        for (var letter of alphabet) {
        let letterInput = '"' + letter + '"';
            $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
        }
    }
    function initBoard() {
        for (var letter in selectedWord) {
            board.push("_");
        }
    }
    function updateBoard() {
        $("#word").empty();
        for (var i=0; i < board.length; i++) {
            $("#word").append(board[i] + " ");
        }
    }
    function updateWord(positions, letter) {
        for (var pos of positions) {
            board[pos] = letter;
        }
        updateBoard(board);
        if (!board.includes('_')) {
            endGame(true);
        }
    }
    function checkLetter(letter) {
        var positions = new Array();
        for (var i = 0; i < selectedWord.length; i++) {
            if (letter == selectedWord[i]) {
                positions.push(i);
            }
        }
        if (positions.length > 0) {
            updateWord(positions, letter);
        } else {
            remainingGuesses -= 1;
            updateMan();
            if (remainingGuesses <= 0) {
                endGame(false);
            }
        }
        guessed(letter);
    }
    function updateMan() {
        $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
    }
    function endGame(win) {
        $("#letters").hide();
        $("#hint").hide();
        if (win) {
            $('#won').show();
        } else {
            $('#lost').show();
        }
    }
    function disableButton(btn) {
        btn.prop("disabled",true);
        btn.attr("class", "btn btn-danger")
    }
    function guessed(letter){
        var guessed = document.querySelector('#guessed');
        guessed.innerHTML += letter + '  ';
    }