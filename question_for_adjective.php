<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Adjective</title>
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
        <p>Adjective: <span id="wordDisplay"></span></p>
        <p id="defi">Definition: <span id="definitionDisplay"></span></p>
        <button id="nextButton">NEXT</button>
    </div>
    
    <div id="gameOverDisplay" style="display:none;">
        <h1 id="over">Game Over</h1>
        <p id="congrats">Congratulations for completing the quiz!</p>
        <p id="final">Your Final Score: <span id="finalScoreDisplay"></span></p>
        <a href="third.php">Back to Main Menu:</a>
    </div>
</body>
<script>
    let questions = [
    {
        question: 'In the sentence "The big house is on the corner," what do you think is the adjective?',
        choices: ['house', 'corner', 'big', 'The'],
        correctAnswer: 'c',
        word: 'Big',
        definition: 'Big is the adjective in the sentence, describing the size of the house. Big describes something that is large in height, weight, size, or amount.'
    },
    {
        question : 'In the sentence "She wore a beautiful dress," what is the adjective?',
        choices: ['She', 'dress', 'wore', 'beautiful'],
        correctAnswer: 'd',
        word: 'Beautiful',
        definition: ' Definition: The beautiful describes in the sentence is the dress. Beautiful, pretty, lovely, and handsome describe people and things that are pleasing to look at, hear, etc. beautiful When used of a person.'
    },
    {
        question: 'The friendly dog wagged its tail.',
        choices: ['The', 'friendly', 'dog', 'wagged'],
        correctAnswer: 'b',
        word: 'Friendly',
        definition: 'Friendly, describes people who are kind, caring, and make you feel comfortable, according to the sentence, the dog is friendly because the dog wagged its tail. You can use the word friendly, when someone who is kind and easy to get along with.'
    },
    {
        question: 'She had a very dark hair.',
        choices: ['she', 'had', 'very', 'dark'],
        correctAnswer: 'd',
        word: 'Dark',
        definition: 'It is a state in which no light can be seen. It is to define something that is black or dark, it can be use in place, things and etc. '
    },
    {
        question:'She have a really bad cold.',
        choices: ['She', 'had', 'really', 'bad'],
        correctAnswer: 'd',
        word: 'Bad',
        definition: 'The adjective bad meaning “unpleasant, unattractive, unfavorable, spoiled, etc.,” is the usual form to follow such copulative verbs as sound, smell, look, and taste. It can be use to define something that is bad smell, sound, look and taste.'
    },
    {
        question:'She felt tired after the long hike.',
        choices: ['She', 'felt', 'tired', 'long'],
        correctAnswer: 'c',
        word: 'tired',
        definition: 'Tired describes the state of feeling exhausted or fatigued. In the sentence, it says she felt tired because of the long hike and It can be use when u felt or someone felt exhauted or fatigued.'
    },
    {
        question:' The tallest building in the city is the new skyscraper.',
        choices: ['tallest', 'building', 'is', 'skyscraper'],
        correctAnswer: 'a',
        word: 'Tallest',
        definition: 'An object or person is said to be the tallest if the height of the object/person is greatest among all the objects/people placed and  You can use it to describe something that is large in height.'
    },
    {
        question:'The old book had yellowed pages.',
        choices: ['The ', ' old', 'yellowed', 'pages'],
        correctAnswer: 'b',
        word: 'old',
        definition: '"Old" describes the age or condition of the book and you can use it to describe something that is old in age.'
    },
    {
        question:'The spicy food made my mouth burn.',
        choices: ['spicy', 'food', 'made', ' burn'],
        correctAnswer: 'a',
        word: 'spicy',
        definition: 'Spicy describes the flavor or taste of the food and  It can be use when the food is containing a strong flavours from spices. The spicy can be use todescribe the taste that is spicy.'
    },
    {
        question:'The shy girl hid behind her mother\'s skirt.',
        choices: ['shy ', 'behind', 'mother\'s', 'hid'],
        correctAnswer: 'a',
        word: 'shy',
        definition: 'Shy is to feel uncomfortable in the presence of others. Also when someone is being nervous or reserved around other people, especially in a social situation and  It can be use in a sentence to describe someone that is feeling nervous and uncomfortable around others.'
    },
    {
        question:'He is a___man. ',
        choices: [' wealth ', 'wealthy', ' chief', 'all of the above'],
        correctAnswer: 'a',
        word: 'wealthy',
        definition: 'Having goods, property, and money in abundance. there are also a word rich implies having more than enough to gratify normal needs or desires and It can be use when someone having good and abundance or when someone have more than enough to gratify.'
    },
    {
        question:'The _ dog was barking.',
        choices: [' angry', 'anger', 'angrily', 'all of the above'],
        correctAnswer: 'a',
        word: 'angry',
        definition: 'A strong feeling of being upset or annoyed because of something wrong or bad and It can be use to describe a feeling, there are also more term like frustrated, upset etc... '
    },
    {
        question:'This is the ___part of the movie.',
        choices: ['drama', 'dramatic', ' tuneful', 'all of the above'],
        correctAnswer: 'b',
        word: 'dramatic',
        definition: 'Dramatic is a way of talking or behaving in a way that makes something seem much worse, more serious, more frightening, etc. than it really is and It is mostly use when someone is sad, or overreacted.'
    },
    {
        question:'She is the ___ student in the class.',
        choices: ['good', 'better', 'best', 'all of the above'],
        correctAnswer: 'c',
        word: 'best',
        definition: 'The highest quality, to the greatest degree, in the most effective way, or being the most suitable or pleasing and It can be use when someone is in its best.'
    },
    {
        question:'I feel ___ today. ',
        choices: ['happily', 'happy', ' happiness', 'all of the above'],
        correctAnswer: 'b',
        word: 'happyt',
        definition: 'Happy describes a feeling of joy, delight, or glee and  It can be use to describe when someone is feeling happy.'
    },
    {
        question:' Her hair is long and___.',
        choices: ['curly', 'happy', 'slim', 'all of the above'],
        correctAnswer: 'a',
        word: 'curly',
        definition: ' made, growing, or arranged in curls or curves and It is to describe when something is curves and curly.'
    },
    {
        question:' He drives a bright red sports car. It\'s very___.',
        choices: ['wild', ' shallow', 'fast', 'all of the above'],
        correctAnswer: 'c',
        word: 'fast',
        definition: 'moving or capable of moving at high speed and It is to describe when something or someone is moving at a high speed.'
    },
    {
        question:'Today, the weather\'s going to be_____.',
        choices: ['hopeful', 'warm', 'blue', 'all of the above'],
        correctAnswer: 'b',
        word: 'warm',
        definition: 'serving to maintain or preserve heat especially to a satisfactory degree and It is to describe when ithe temperature is in a satisfactory degree.'
    },
    {
        question:'This house is ___ and old.',
        choices: ['awkward', 'electric', 'large', 'all of the above'],
        correctAnswer: 'c',
        word: 'large',
        definition: 'It is to describe when something have a great, big size.'
    },
    {
        question:' I\'m feeling really _ today.',
        choices: ['late', ' long', 'happy', 'all of the above'],
        correctAnswer: 'c',
        word: 'happy',
        definition: 'feeling or showing pleasure or contentment and It is to describe when you or someone are having fun or feeling of contenment.'
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