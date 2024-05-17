<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Type of Sentence</title>
    <link rel="stylesheet" href="style_for_questions.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="game">
        <div class="questionWrapper">
            <p id="score">Score: <span id="scoreCountDisplay">0</span></p>
            <p  id="question">Question #<span id="questionCountDisplay">1</span></p>
            <p id="questionDisplay">Sample Question</p>
            <!-- <img id="logoo" src="./../images/logomo.png" height="100px"/> -->
            <hr>
        </div>
        
        <div class="choices">
            <div class="choice-1">
                <input type="radio" name="choices" data-value="a">
                <label for="a" class="choiceDisplay">A. Choice 1</label>
            </div>
            <div class="choice-2">
                <input type="radio" name="choices" data-value="b">
                <label for="b" class="choiceDisplay">B. Choice 2</label>
            </div>
            <div class="choice-3">
                <input type="radio" name="choices" data-value="c">
                <label for="c" class="choiceDisplay">C. Choice 3</label>
            </div>
            <div class="choice-4">
                <input type="radio" name="choices" data-value="d">
                <label for="d" class="choiceDisplay">D. Choice 4</label>
            </div>
        </div>
        
        <button id="submitButton">SUBMIT</button>
    </div>
    
    <div id="infoDisplay" style="display: block;">
        <p>Correct Answer: <span id="correctAnswerDisplay"></span></p>
        <p>Type of Sentence: <span id="wordDisplay"></span></p>
        <p id="defi">Definition: <span id="definitionDisplay"></span></p>
        <button id="nextButton">NEXT</button>
    </div>
    
    <div id="gameOverDisplay" style="display: none;">
        <h1 id="over">Game Over</h1>
        <p id="congrats">Congratulations for completing the quiz!</p>
        <p id="final">Your Final Score: <span id="finalScoreDisplay"></span></p>
        <a href="third.php">Back to Main Menu:</a>
    </div>
</body>
<script>
    let questions = [
    {
        question: 'Which type of sentence expresses strong emotions or excitement?',
        choices: ['Declararative', 'Interrogative', 'Exclamatory', 'Imperative'],
        correctAnswer: 'c',
        word: 'Exclamatory',
        definition: 'An exclamatory sentence expresses strong emotions or excitement. Example: What a beautiful sunset!'
    },
    {
        question: 'Which sentence is an example of an imperative sentence?',
        choices: ['What time is it?', 'Please pass the salt.', 'I like ice cream', 'I like that dress.'],
        correctAnswer: 'b',
        word: 'Please pass the salt.',
        definition: 'An imperative sentence gives a command or makes a request. Example: Please pass the salt.'
    },
    {
        question: 'She is a talented singer.',
        choices: ['Declarative', 'Interrogative', 'Exclamatory', 'Imperative'],
        correctAnswer: 'a',
        word: 'declarative',
        definition: 'A declarative sentence makes a statement or provides information. Example: She is a talented singer.'
    },
    {
        question: 'Please pass the salt.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'c',
        word: 'Imperative',
        definition: ' An imperative sentence gives a command or makes a request.'
    },
    {
        question: 'What time does the movie start?',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'b',
        word: 'Interrogative',
        definition: 'An interrogative sentence asks a question.'
    },
    {
        question: 'The sun is shining brightly today.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'a',
        word: 'Declarative',
        definition: 'declarative sentence makes a statement or expresses an idea.'
    },
    {
        question: 'Don\'t forget to water the plants.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'c',
        word: 'Imperative',
        definition: 'An imperative sentence gives a command or makes a request.'
    },
    {
        question: 'What a beautiful sunset!',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'd',
        word: ' Exclamatory',
        definition: 'An exclamatory sentence expresses strong emotion or excitement.'
    },
    {
        question: 'Take out the trash before you leave.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'c',
        word: ' Imperative',
        definition: 'An imperative sentence gives a command or makes a request.'
    },
    {
        question: 'I love reading books.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'a',
        word: 'Declarative',
        definition: ' A declarative sentence makes a statement or expresses an idea. '
    },
    {
        question: 'Are you coming to the party?',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'b',
        word: 'Interrogative',
        definition: 'An interrogative sentence asks a question.'
    },
    {
        question: 'She ran the marathon in record time!',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'd',
        word: 'Exclamatory',
        definition: 'An exclamatory sentence expresses strong emotion or excitement.'
    },
    {
        question: 'Please turn off the lights before you go to bed.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'c',
        word: 'Imperative',
        definition: 'An imperative sentence gives a command or makes a request.'
    },
    {
        question: 'Close the door',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'c',
        word: 'Imperative',
        definition: 'An imperative sentence gives a command or makes a request.'
    },
    {
        question: 'he sun is shining brightly.',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'a',
        word: 'Declarative',
        definition: 'declarative sentence makes a statement or expresses an idea.'
    },
    {
        question: 'What a beautiful day!',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'd',
        word: 'Exclamatory',
        definition: 'An exclamatory sentence expresses strong emotions or excitement. Example: What a beautiful sunset!'
    },
    {
        question: 'what type of sentences makes a statement of provide information?',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'a',
        word: 'Declarative',
        definition: 'declarative sentence makes a statement or expresses an idea.'
    },
    {
        question: 'Which type of sentence is used to ask a question?',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'b',
        word: 'Interrogative',
        definition: 'An interrogative sentence asks a question.'
    },
    {
        question: 'What type of sentence gives a command or makes a request?',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'c',
        word: 'Imperative',
        definition: 'An imperative sentence gives a command or makes a request.'
    },
    {
        question: ' Which type of sentence expresses strong emotions or exclamations?',
        choices: ['Declarative', 'Interrogative', 'Imperative', 'Exclamatory'],
        correctAnswer: 'd',
        word: 'Exclamatory',
        definition: 'An exclamatory sentence expresses strong emotions or excitement. Example: What a beautiful sunset!'
    }
];
let questionNumber = 0;
let correctAnswer;
let score = 0;

function generateQuestion() {
    if(questionNumber + 1 > questions.length) {
        gameOver();
        return;
    }
    let question = questions[questionNumber];
    correctAnswer = question.correctAnswer;
    document.getElementById("questionCountDisplay").textContent = questionNumber + 1;
    displayQuestion(question);
}

function displayQuestion(question) {
    document.getElementById("questionDisplay").textContent = question.question;
    
    let choices = document.getElementsByClassName("choiceDisplay");
    let letters = ['A. ', 'B. ', 'C. ', 'D. '];
    
    for(let i = 0; i <= 3; i++) {
        choices[i].textContent = letters[i] + question.choices[i];
    }
}

document.getElementById("submitButton").addEventListener('click', () => {
    checkAnswer();
});

function checkAnswer() {
    let choices = document.getElementsByName('choices');
    let choicesDisplay = document.getElementsByClassName("choiceDisplay");
    
    for(let a = 0; a <=3; a++) {
        if(!choices[a].checked) continue;
        if(choices[a].getAttribute('data-value') == correctAnswer) {
            alert('correct!');
            //choicesDisplay[a].style.backgroundColor = "green";
            document.getElementById("submitButton").style.display = 'none';
            choices[a].checked = false;
            isCorrectAnswer();
            displayInfo();
        }else {
            alert('wrong!');
            //choicesDisplay[a].style.backgroundColor = "red";
            document.getElementById("submitButton").style.display = 'none';
            displayInfo();
        }
    }
}

function isCorrectAnswer() {
    score++;
    document.getElementById("scoreCountDisplay").textContent = score;
}

function displayInfo() {
    document.getElementById("correctAnswerDisplay").textContent = questions[questionNumber].correctAnswer.toUpperCase();
    document.getElementById("wordDisplay").textContent = questions[questionNumber].word;
    document.getElementById("definitionDisplay").textContent = questions[questionNumber].definition;
    document.getElementById("infoDisplay").style.display = "block";
}

function hideInfo() {
    document.getElementById("infoDisplay").style.display = "none";
}

document.getElementById("nextButton").addEventListener('click', () => {
    hideInfo();
    document.getElementById("submitButton").style.display = "block";
    questionNumber++;
    generateQuestion();
});

function gameOver() {
    document.getElementById("finalScoreDisplay").textContent = score;
    document.getElementById("gameOverDisplay").style.display = 'block';
    document.getElementById("game").style.display = 'none';
}

generateQuestion();
</script>
</html>