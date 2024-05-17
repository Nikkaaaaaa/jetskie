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
        <p> article: <span id="wordDisplay"></span></p>
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
        question: 'I saw ___ eagle flying in the sky."',
        choices: ['a', 'an', 'the', 'with'],
        correctAnswer: 'b',
        word: 'an',
        definition: '"An" is an indefinite article used before words that begin with a vowel sound. Example: I saw an eagle flying in the sky.'
    },
    {
        question: 'He has ___ apple and ___ orange.',
        choices: ['a / a', 'an / an', 'an / a', 'an / has'],
        correctAnswer: 'b',
        word: 'an / an',
        definition: '"A" is an indefinite article used before words that begin with a consonant sound, and "an" is used before words that begin with a vowel sound. Example: He has an apple and an orange.'
    },
    {
        question: 'Which sentence is correct?',
        choices: ['I have a cat and a dog.', 'I have the cat and the dog.', 'I have an cat and an dog.', 'I have that cat and dog'],
        correctAnswer: 'a',
        word: 'I have a cat and a dog',
        definition: '"A" is an indefinite article used before words that begin with a consonant sound. Example: I have a cat and a dog.'
    },
    {
        question: 'She is eating ___ banana.',
        choices: ['a', 'an', 'the', 'with'],
        correctAnswer: 'a',
        word: 'a',
        definition: '"A" is an indefinite article used before words that begin with a consonant sound. Example: She is eating a banana.'
    },
    {
        question: 'I need to buy ___ new book for school.',
        choices: ['a', 'an', 'the', 'that'],
        correctAnswer: 'a',
        word: 'a',
        definition: '"A" is an indefinite article used before words that begin with a consonant sound. Example: I need to buy a new book for school.'
    },
    {
        question: ' I saw _____ bird flying in the sky.',
        choices: ['a', 'an', 'the', 'that'],
        correctAnswer: 'a',
        word: 'a',
        definition: '"A" is used before a singular noun when you are referring to any one of that thing. Example: "I saw a dog in the park."'
    },
    {
        question: ' She has ___ apple and ___ orange.',
        choices: ['a / a', 'an / an', 'an / a', ' the / the'],
        correctAnswer: 'b',
        word: 'An',
        definition: '"An" is used before a singular noun that begins with a vowel sound when you are referring to any one of that thing.Example: "She ate an apple for breakfast."'
    },
    {
        question: 'He is reading _____ book.',
        choices: ['a', 'an', 'the', 'that'],
        correctAnswer: 'a',
        word: 'a',
        definition: '"A" is used before a singular noun when you are referring to any one of that thing. Example: "I saw a dog in the park."'
    },
    {
        question: 'We need to buy _____ electric fan from the store.',
        choices: ['the', 'a', 'an', 'that'],
        correctAnswer: 'c',
        word: 'an',
        definition: '"An" is used before a singular noun that begins with a vowel sound when you are referring to any one of that thing.Example: "She ate an apple for breakfast."'
    },
    {
        question: 'I have _____ ideas for the project.',
        choices: ['a', 'an', 'some', 'that'],
        correctAnswer: 'c',
        word: 'some',
        definition: '"Some" is used before plural nouns or non-countable nouns when you are referring to an unspecified amount or number of something. Example: "She bought some books at the bookstore."'
    },
    {
        question: 'She is wearing ____ red dress.',
        choices: ['a', 'an', 'the', 'that'],
        correctAnswer: 'a',
        word: 'a',
        definition: '"A" is used before a singular noun when you are referring to any one of that thing. Example: "I saw a dog in the park."'
    },
    {
        question: 'They went to _____ beach for their vacation.',
        choices: ['a', 'an', 'the', 'that'],
        correctAnswer: 'c',
        word: 'the',
        definition: '"the"  denoting persons or things that are already or about to be mentioned, under discussion, implied or otherwise presumed familiar to listeners, readers, or speakers.'
    },
    {
        question: 'He is playing _____ guitar.',
        choices: ['a', 'an', 'the', 'that'],
        correctAnswer: 'c',
        word: 'the',
        definition: '"the"  denoting persons or things that are already or about to be mentioned, under discussion, implied or otherwise presumed familiar to listeners, readers, or speakers.'
    },
    {
        question: ' I have _____ good news for you.',
        choices: ['an', 'a', 'the', 'any'],
        correctAnswer: 'a',
        word: 'an',
        definition: '"An" is an indefinite article used before words that begin with a vowel sound. Example: I saw an eagle flying in the sky.'
    },
    {
        question: 'Choose the sentence that uses correct articles,     I want to buy a new car.   ',
        choices: [' l', ' want', ' a', 'to'],
        correctAnswer: 'c',
        word: 'a',
        definition: ' no definition needed '
    },
    {
        question: 'She wants to become an astronaut.',
        choices: ['she', 'to', 'an', 'None'],
        correctAnswer: 'c',
        word: 'an',
        definition: ' no definition needed '
    },
    {
        question: 'She is wearing a red dress.',
        choices: ['she', 'is ', 'a', 'None'],
        correctAnswer: 'c',
        word: 'a',
        definition: ' no definition needed '
    },
    {
        question: 'Do you have some oranges?',
        choices: ['Do', 'you ', 'have', 'Some'],
        correctAnswer: 'd',
        word: 'some',
        definition: ' no definition needed '
    },
    {
        question: 'I saw a bird in that tree.',
        choices: ['a', 'saw ', 'in', 'that'],
        correctAnswer: 'a',
        word: 'a',
        definition: ' no definition needed '
    },
    {
        question: 'She wants to be an actress.',
        choices: ['she', 'wants', 'to', 'an'],
        correctAnswer: 'd',
        word: 'an',
        definition: ' no definition needed '
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