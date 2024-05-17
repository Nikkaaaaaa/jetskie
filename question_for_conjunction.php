<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Conjunction</title>
    <link rel="stylesheet" href="style_for_questions.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="game">
        <div class="questionWrapper">
            <p  id="score">Score: <span id="scoreCountDisplay">0</span></p>
            <p id="question">Question #<span id="questionCountDisplay">1</span></p>
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
        <p>Conjunction: <span id="wordDisplay"></span></p>
        <p id="defi">Definition: <span id="definitionDisplay"></span></p>
        <button id="nextButton">NEXT</button>
    </div>
    
    <div id="gameOverDisplay" style="display: none;">
        <h1 id="over">Game Over</h1>
        <p id="congrats">Congratulations for completing the quiz!</p>
        <p id="final">Your Final Score: <span id="finalScoreDisplay"></span></p>
        <a  href="third.php">Back to Main Menu:</a>
    </div>
</body>
<script>
    let questions = [
    {
        question: 'Which conjunction can you use to join two similar ideas?',
        choices: ['and', 'but', 'or', 'either'],
        correctAnswer: 'a',
        word: 'and',
        definition: '"And" is a conjunction used to join two similar ideas. Example: I like to read books and watch movies.'
    },
    {
        question: 'I want to go to the park, ___ its raining outside.',
        choices: ['but', 'and', 'or', 'so'],
        correctAnswer: 'a',
        word: 'but',
        definition: '"But" is a conjunction used to show contrast between two ideas. Example: I want to go to the park, but its raining outside.'
    },
    {
        question: 'She studied hard _____ she passed the exam.',
        choices: ['so', 'because', 'if', 'but'],
        correctAnswer: 'a',
        word: 'so',
        definition: '"So" is a conjunction used to indicate a reason or cause. Example: She studied hard, so she passed the exam.'
    },
    {
        question: 'Which conjunction can you use to show contrast between two ideas?',
        choices: ['and', 'but', 'or', 'else'],
        correctAnswer: 'b',
        word: 'but',
        definition: '"But" is a conjunction used to show contrast between two ideas. Example: I like both chocolate but vanilla ice cream.'
    },
    {
        question: 'I like both chocolate ___ vanilla ice cream.',
        choices: ['and', 'or', 'but', 'just'],
        correctAnswer: 'a',
        word: 'and',
        definition: '"And" is a conjunction used to join two similar ideas. Example: I like both chocolate and vanilla ice cream.'
    },
    {
        question: 'We can go out for dinner now ____  later.',
        choices: ['or ', 'yet', 'but', 'all of the above'],
        correctAnswer: 'a',
        word: 'or',
        definition: '"or" is a conjunction used to  Connects two or more possibilities or alternatives.'
    },
    {
        question: 'John can\'t speak Japanese, ____ he can speak Spanish.',
        choices: ['so', 'nor', 'but', 'all of the above'],
        correctAnswer: 'c',
        word: 'but',
        definition: '"but" is a conjunction Used to indicate contrast or opposition between elements in a sentence.'
    },
    {
        question: 'I was late, _____ I decided to take a taxi to work.',
        choices: ['for ', 'yet', 'so', 'all of the above'],
        correctAnswer: 'c',
        word: 'so',
        definition: '"so" is a conjunction used to introduce clauses of result or decision.'
    },
    {
        question: 'My classmate didn\'t study for the test,_____ she still passed.',
        choices: [' yet ', 'nor', ' or', 'all of the above'],
        correctAnswer: 'a',
        word: 'yet',
        definition: '"yet" is  The conjunction “yet” is used in a  sentence if you want to let others know that you are still in a situation and it is going to continue in the near future '
    },
    {
        question: ' In the end, the company didn\'t make money... did it lose money.',
        choices: ['for ', ' nor', 'so', 'all of the above'],
        correctAnswer: 'b',
        word: 'nor',
        definition: '"so" Use the conjunction “nor” before the second of farther of two alternatives when “neither” introduces the first.'
    },
    {
        question: 'My pet cat is cold and hungry... it didn\'t come back home last night.',
        choices: ['for ', 'or', 'nor', 'all of the above'],
        correctAnswer: 'a',
        word: 'for',
        definition: 'The conjunction “For” has multiple uses; it can function as a coordinating conjunction, to connect words or groups of words together,  but it can also function as a preposition '
    },
    {
        question: 'Seoul is a large city, ____ it is located in Asia.',
        choices: ['but  ', ' and', 'so', 'all of the above'],
        correctAnswer: 'b',
        word: 'and',
        definition: 'To connect two words, phrases, clauses, or prefixes together and Use the conjunction “and” to connect grammatically coordinate words, phrases, or clauses '
    },
    {
        question: 'The universe is a big place,... there may be intelligent life out there.',
        choices: ['or ', ' for', 'so', 'all of the above'],
        correctAnswer: 'b',
        word: 'for',
        definition: 'To talk about a purpose or a reason for something and The conjunction “For” has multiple uses; it can function as a coordinating conjunction, to connect words or groups of words together,  but it can also function as a preposition '
    },
    {
        question: 'I have some free time _____ an extra ticket. Do you want to see a movie?',
        choices: ['and ', 'for', 'yet', 'all of the above'],
        correctAnswer: 'a',
        word: 'and',
        definition: 'To connect two words, phrases, clauses, or prefixes together and  Use the conjunction “and” to connect grammatically coordinate words, phrases, or clauses '
    },
    {
        question: ' I'+'m not really hungry, _____ that apple pie looks delicious!',
        choices: ['so ', 'yet', 'nor', 'all of the above'],
        correctAnswer: 'b',
        word: 'yet',
        definition: 'We use “yet” as an adverb to refer to a time which starts in the past and continues up to the present and The conjunction “yet” is used in a  sentence if you want to let others know that you are still in a situation and it is going to continue in the near future '
    },
    {
        question: 'Elephants are big, but blue whales are even bigger.',
        choices: ['blue ', 'big', 'but', 'all of the above'],
        correctAnswer: 'c',
        word: 'but',
        definition: 'Conjunction “but” means “on the contrary” and Used to indicate contrast or opposition between elements in a sentence.'
    },
    {
        question: 'The capital city of the United States is not New York, nor is it Los Angeles.',
        choices: ['The ', ' nor', ' city', 'all of the above'],
        correctAnswer: 'b',
        word: 'nor',
        definition: 'Introduce a second negative clause and Use the conjunction “nor” before the second of farther of two alternatives when “neither” introduces the first.'
    },
    {
        question: 'Can you help me carry these books, or are you busy right now?',
        choices: ['help ', 'are', ' or', 'all of the above'],
        correctAnswer: 'c',
        word: 'or',
        definition: ' Connects two or more possibilities or alternatives'
    },
    {
        question: 'I need a pen and some paper to write some notes.',
        choices: ['and', 'a', ' I', 'all of the above'],
        correctAnswer: 'a',
        word: 'and',
        definition: 'To connect two words, phrases, clauses, or prefixes together and  Use the conjunction “and” to connect grammatically coordinate words, phrases, or clauses'
    },
    {
        question: 'Sam lived in France for two years, so he can speak French.',
        choices: ['so', 'lived', 'can', 'all of the above'],
        correctAnswer: 'a',
        word: 'so',
        definition: 'The conjunction “so” is used to introduce clauses of result or decision'
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

generateQuestion();0

</script>
</html>