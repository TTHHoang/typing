<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Montserrat|Lora&display=swap" rel="stylesheet">
    <title>Typing game</title>
</head>

<body>
    <main>
        <header>
            <div class="info">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="infoHover">
                Start typing to start the typing test. Use space or enter to submit the word.
            </div>
        </header>

        <div class="wrapper">
            <div class="animationContainer">
                <div class="timer">60</div>
                <div class="burgerTop">
                    <div class="mouth"></div>
                    <div class="mouthSad"></div>
                    <div class="lettuce"></div>
                    <div class="tomato"></div>
                    <div class="onion"></div>
                    <div class="cheese"></div>
                    <div class="meat"></div>
                    <div class="pickles"></div>
                </div>
                <div class="burgerBottom"></div>
            </div>
            <div class="topDiv">
                <div class="score">
                </div>
                <div class="wrongAnswers">
                </div>
                <div class="strokes">
                </div>
            </div>
            <div class="word">
            </div>
            <div class="bottomPlate"></div>
            <div class="bottomDiv">
                <p>Place your order</p>
                <input type="text" name="inputWord" value="" class="inputWord" autofocused>
                <button type="button" name="button" id="refresh"><i class="fas fa-sync-alt"></i></button>
            </div>
            <div class="overlay">
                <input type="text" name="" value="" class="addItemInput">
                <input type="submit" name="" value="" class="addItem">
            </div>
        </div>

    </main>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
