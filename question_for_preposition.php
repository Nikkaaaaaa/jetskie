<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Preposition</title>
    <link rel="stylesheet" href="style_for_questions.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div id="game">
        <div class="questionWrapper">
            <p id="score">Score: <span id="scoreCountDisplay">0</span></p>
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
        <p>Preposition: <span id="wordDisplay"></span></p>
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
        question: 'Why did you decide on sitting beside your friend in class?',
        choices: ['did', 'your', 'beside', 'on'],
        correctAnswer: 'c',
        word: 'beside',
        definition: '"beside" indicates being alongside or near something or someone. It is used to show the position next to or alongside a person or object.'
    },
    {
        question: 'Sentence: Who are you going to the school dance with next week?',
        choices: ['are', 'going', 'with', 'who'],
        correctAnswer: 'c',
        word: 'with',
        definition: '"with" indicates accompaniment or association. It is used to show the relationship between two or more things or people who are together.'
    },
    {
        question: 'What did you do before lunch?',
        choices: ['did', 'what', 'before', 'do'],
        correctAnswer: 'c',
        word: 'before',
        definition: '"before" indicates a position in time prior to an event or point. It is used to show the time preceding an action or event.'
    },
    {
        question: 'Where did you leave your book during the math class?',
        choices: ['where', 'during', 'the', 'did'],
        correctAnswer: 'b',
        word: 'during',
        definition: '"during" indicates a period of time when something happens. It is used to show the time within which an event or activity occurs.'

    },
    {
        question: 'Whom did you hear the news about the upcoming trip from?',
        choices: ['whom', 'from', 'did', 'the'],
        correctAnswer: 'b',
        word: 'from',
        definition: '"from" indicates the point of origin or separation. It is used to show the starting point or source of something, or the point of separation or departure.'
    },
    {
        question: 'The cat sat ____the chair, waiting for its owner.',
        choices: ['on', 'in', 'at', 'by'],
        correctAnswer: 'a',
        word: 'on',
        definition: '"On" is used to describe a position where something is physically supported by or in contact with a surface and We use "on" when something is positioned above and in contact with a surface. For example, "The book is on the table," indicates that the book is physically supported by the table surface.'
    },
    {
        question: 'The ball rolled __ the floor, stopping near the wall.',
        choices: ['over', 'under', 'across', 'between'],
        correctAnswer: 'c',
        word: 'across',
        definition: ' "Across" is used to describe movement or position from one side to the other side of something and We use "across" when something is moving or positioned from one side to the other side of an object or area. For example, "The ball rolled across the floor," indicates that the ball moved from one side of the floor to the other side. '
    },
    {
        question: 'Sarah lives ____ the house next to the park.',
        choices: ['in', ' on', 'at', 'by'],
        correctAnswer: 'a',
        word: 'in',
        definition: ' "In" is used to describe something that is located inside or within a space or area and We use "in" when something is contained or located inside a specific area or object. For example, "The cat is in the box," indicates that the cat is located inside the box.'
    },
    {
        question: ' My family and I moved______that mansion.',
        choices: ['on', 'under', 'between', 'into'],
        correctAnswer: 'd',
        word: 'into',
        definition: '  "Into" indicates movement toward the inside of a place or object and "Into" is used to describe the action of moving from the outside to the inside of something. For example, "The cat jumped into the box," illustrates the movement of the cat from outside the box to inside it. '
    },
    {
        question: 'I\'ll study_____ the candle melts.',
        choices: ['until', 'on', 'at', 'by'],
        correctAnswer: 'a',
        word: 'until',
        definition: '  "Until" means up to a specific point in time or extent and "Until" is used to indicate the time or extent up to which an action or event continues. For example, "The store is open until 9 p.m.," specifies the time at which the store remains open until, indicating the endpoint of its operating hours. '
    },
    {
        question: 'Linda lived______ the river.',
        choices: ['across', 'under', 'into', 'near'],
        correctAnswer: 'd',
        word: 'Near',
        definition: ' "Near" means close to or not far from a specific location and "Near" is used to describe something in close proximity to another object or place. For example, "The store is near the park," indicates that the store is in close proximity to the park, not far away.'
    },
    {
        question: 'The cup is ______ the table, next to the plate.',
        choices: ['between', 'behind', 'on', 'beside'],
        correctAnswer: 'd',
        word: 'beside',
        definition: '  "Beside" is used to describe something that is next to or alongside another object or person and We use "beside" when something is positioned next to or alongside another object or person. For example, "The cup is beside the plate," indicates that the cup is located next to or alongside the plate.'
    },
    {
        question: 'The bird flew ____ the tree, singing a sweet melody.',
        choices: ['through', 'over', 'against', 'below'],
        correctAnswer: 'b',
        word: 'over',
        definition: '"Over" is used to describe movement or position above or across something and We use "over" when something is moving or positioned from one side to the other side above something else. For example, "The bird flew over the tree," indicates that the bird moved from one side of the tree to the other side above it.'
    },
    {
        question: 'The cat sleeps ______ the bed, dreaming of adventures.',
        choices: [' in', 'at', 'above', 'by'],
        correctAnswer: ' a',
        word: ' in',
        definition: ' "In" is used to describe something that is located inside or within a space or area and We use "in" when something is contained or located inside a specific area or object. For example, "The cat is in the box," indicates that the cat is located inside the box.'
    },
    {
        question: 'I should submit my project ______ the next 24 hours.',
        choices: [' in', 'on', 'within', 'by'],
        correctAnswer: ' c',
        word: ' within',
        definition: ' "Within" means inside or not beyond a particular boundary or limit and We use "within" to indicate that something is inside a specific area or boundary. For example, "The keys are within the drawer," shows that the keys are inside the drawer and not outside of it.'
    },
    {
        question: 'Choose the correct preposition: The cat is ______ the box.',
        choices: [' under', 'on', 'in', 'beside'],
        correctAnswer: ' c',
        word: ' in',
        definition: ' "In" is used to describe something that is located inside or within a space or area and We use "in" when something is contained or located inside a specific area or object. For example, "The cat is in the box," indicates that the cat is located inside the box.'
    },
    {
        question: 'The book is _____ the table.',
        choices: [' at', ' under', 'on', 'beside'],
        correctAnswer: ' c',
        word: ' on',
        definition: ' "On" is used to describe a position where something is physically supported by or in contact with a surface and We use "on" when something is positioned above and in contact with a surface. For example, "The book is on the table," indicates that the book is physically supported by the table surface.'
    },
    {
        question: 'The ball rolled_____the floor.',
        choices: [' across', '  below', 'from', ' into'],
        correctAnswer: ' a',
        word: 'across',
        definition: ' "Across" is used to describe movement or position from one side to the other side of something and We use "across" when something is moving or positioned from one side to the other side of an object or area. For example, "The ball rolled across the floor," indicates that the ball moved from one side of the floor to the other side.'
    },
    {
        question: 'What preposition that moves from one side to another side?',
        choices: [' between', ' beyond', 'in', 'across'],
        correctAnswer: ' d',
        word: ' across',
        definition: ' "Across" is used to describe movement or position from one side to the other side of something and We use "across" when something is moving or positioned from one side to the other side of an object or area. For example, "The ball rolled across the floor," indicates that the ball moved from one side of the floor to the other side.'
    },
    {
        question: 'The cat sleeps ______the bed.',
        choices: [' at', 'in', 'by', 'over'],
        correctAnswer: ' b',
        word: ' in',
        definition: ' "In" is used to describe something that is located inside or within a space or area and We use "in" when something is contained or located inside a specific area or object. For example, "The cat is in the box," indicates that the cat is located inside the box.'
    },
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