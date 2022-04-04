let score;
let wrong;
let wrongAnswers;
let showWord;
let showScore;
let startBtn;
let presentTime;
let refreshBtn;
let seconds;

let showStrokes;
let strokes;
let play;
let topDiv;
let wrapper;
let timerID;
let showCurrentListButton;
let overlay;
let addItemInput;
let addItem;

let mouthSad;
let mouth;

let bt;
let lettuce;
let on;
let tom;
let ch;
let mt;
let pc;

let currentTop;
let newTop;
let parent;

let wpm;

window.onload = function() {
    score = 0;
    wrong = 0;
    wrongAnswers = document.getElementsByClassName('wrongAnswers')[0];
    inputWord = document.getElementsByClassName('inputWord')[0];
    showWord = document.getElementsByClassName('word')[0];
    showScore = document.getElementsByClassName('score')[0];
    startBtn = document.getElementById('start');
    presentTime = document.getElementsByClassName('timer')[0];
    refreshBtn = document.getElementById('refresh');
    seconds = 60;
    presentTime.innerHTML = "0: " + seconds;
    showStrokes = document.getElementsByClassName('strokes')[0];
    strokes = 0;
    play = 0;
    topDiv = document.getElementsByClassName('topDiv')[0];
    wrapper = document.getElementsByClassName('wrapper')[0];
    timerID;
    // showCurrentListButton = document.getElementById('showCurrentList');
    overlay = document.getElementsByClassName('overlay')[0];
    addItemInput = document.getElementsByClassName('addItemInput')[0];
    addItem = document.getElementsByClassName('addItem')[0];
    document.getElementsByClassName('inputWord')[0].value = "";
    mouth = document.getElementsByClassName('mouth')[0];
    mouthSad = document.getElementsByClassName('mouthSad')[0];
    bt = document.getElementsByClassName('burgerTop')[0];
    lettuce = document.getElementsByClassName('lettuce')[0];
    on = document.getElementsByClassName('onion')[0];
    tom = document.getElementsByClassName('tomato')[0];
    ch = document.getElementsByClassName('cheese')[0];
    mt = document.getElementsByClassName('meat')[0];
    pc = document.getElementsByClassName('pickles')[0];
    wpm = 0;
    randomWord();

    overlay.addEventListener('click', function() {
        overlay.style.display = 'none';
        overlay.removeChild(document.getElementsByClassName('list')[0]);
    });
    //
    // showCurrentListButton.addEventListener('click', function() {
    //     let list = document.createElement('div');
    //     words.push(addItemInput.value);
    //     list.classList += 'list';
    //     overlay.appendChild(list);
    //     words.map((item) => {
    //         list.innerHTML += "<br> " + item;
    //     });
    //     overlay.style.display = 'block';
    // });

    refreshBtn.addEventListener('click', function() {
        location.reload();
        clearInput();
    });

    inputWord.addEventListener('focus', function(){
        document.getElementsByClassName('bottomDiv')[0].style.height = '160px';
    });
    inputWord.addEventListener('blur', function(){
        document.getElementsByClassName('bottomDiv')[0].style.height = '';
    });


    window.addEventListener('popstate', function(event) {
        window.location.assign("index.php");
    });

};

function startTimer() {
    if (seconds > 0) {
        seconds--;
        presentTime.innerHTML = "0: " + seconds;
    }
    if (seconds < 10) {
        presentTime.innerHTML = seconds < 60 ? "0: " + "0" + seconds : seconds;
    }
    if (seconds == 0) {
        clearInterval(timerID);
        // presentTime.style.display = 'none';
        wrongAnswers.innerHTML = `${wrong} wrong words`;
        showScore.innerHTML = `WPM ${wpm}`;
        inputWord.setAttribute('disabled', 'disabled');
        inputWord.style.opacity = ".6";
        showWord.style.display = "none";
        showStrokes.innerHTML = `${strokes} keystrokes`;

        //check if logged in and send Highscore
        if(document.getElementById('wpm')){
            sendHighScore();
        }
    }
}

function randomWord() {
    let currentWord = words[Math.floor(Math.random() * words.length)];
    showWord.innerHTML = currentWord;
}

document.addEventListener('keydown', function(event) {
    if (play == 0) {
        //time
        if(inputWord.value !== ''){
            if (document.activeElement === inputWord) {
                timerID = setInterval(startTimer, 1000);
                play++;
            }
        }
    }

    // if (event.code == 'Backspace' || event.code == 'Space') {
    //   if(!seconds == 0 && !play == 0){
    //     strokes--;
    //   }
    // }
    var inp = String.fromCharCode(event.keyCode);
    if(inputWord.value !== ''){
        if (!/[a-zA-Z]/.test(inp)) {
            if (event.code == 'Space' || event.code == 'Enter') {
                checkWord();
                strokes--;

                clearInput();
                event.preventDefault();
            }
        }
    }

});

document.addEventListener('keyup', function() {
    if (!seconds == 0 && !play == 0) {
        strokes++;
    }
});

function checkWord() {
    if (!seconds == 0) {
        if (inputWord.value == showWord.innerHTML) {
            wpm++;
            if(score < 6){
                score++;
            }
            getMoreItems(score);
            randomWord();
        } else {
            wrong++;
            if(score > 0){
                score--;
                removeItems(score);
            }
            randomWord();
        }
    }
}

function getMoreItems(score){
    let bt = document.getElementsByClassName('burgerTop')[0];
    let lettuce = document.getElementsByClassName('lettuce')[0];
    let on = document.getElementsByClassName('onion')[0];
    let tom = document.getElementsByClassName('tomato')[0];
    let ch = document.getElementsByClassName('cheese')[0];
    let mt = document.getElementsByClassName('meat')[0];
    let pc = document.getElementsByClassName('pickles')[0];

    let currentTop = Math.round(window.getComputedStyle(bt, null).getPropertyValue("top").replace('px', ''));
    let newTop;
    let parent = document.getElementsByClassName('burgerTop')[0];

    mouthSad.style.opacity = 0;
    mouth.style.opacity = 1;

    if(score == 1){
        newTop = currentTop - 25;
    }
    else if(score == 5){
            newTop = currentTop - 50;
    }
    else if (score >=6){
        newTop = 0;
    } else {
        newTop = currentTop - 25;
    }
    bt.style.top = newTop + 'px';

    if(score <= 0){
        lettuce.style.opacity = 0;
        mouthSad.style.opacity = 1;
        mouth.style.opacity = 0;
    } else if(score <=6){
        parent.children[score+1].style.opacity = 1;
    }

    //show next children instead of this
}
function removeItems(score){
    bt = document.getElementsByClassName('burgerTop')[0];
    lettuce = document.getElementsByClassName('lettuce')[0];
    on = document.getElementsByClassName('onion')[0];
    tom = document.getElementsByClassName('tomato')[0];
    ch = document.getElementsByClassName('cheese')[0];
    mt = document.getElementsByClassName('meat')[0];
    pc = document.getElementsByClassName('pickles')[0];
    let parent = document.getElementsByClassName('burgerTop')[0];

    let currentTop = Math.round(window.getComputedStyle(bt, null).getPropertyValue("top").replace('px', ''));
    let newTop;
    if(score == 1){
        newTop = currentTop + 25;
    }
    else if(score == 5){
        newTop = currentTop + 40;
    }
    else {
        newTop = currentTop + 25;
    }
    bt.style.top = newTop + 'px';

    if(score <= 0){
        lettuce.style.opacity = 0;
        mouthSad.style.opacity = 1;
        mouth.style.opacity = 0;
    } else {
        if (score <= 6) {
            parent.children[score+2].style.opacity = 0;
        }
    }
}

function clearInput() {
    inputWord.value = "";
}

function sendHighScore(){
        var data = {};
        var highscore = parseInt(wpm);
        data = {hs: highscore};

        ajaxRequests(data, sendHsSuccess, 'SaveHighscore');

        window.history.pushState('page2', 'Title', 'main');

}

function sendHsSuccess(resp){
    createSnackbar("New highscore saved!");
    if(document.getElementById('wpm').querySelector('p').innerHTML <= resp.hs){
        document.getElementById('wpm').querySelector('p').innerText = resp.hs;
    }
}
