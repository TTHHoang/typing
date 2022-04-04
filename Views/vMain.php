<?php

class vMain{

    function __construct(){

    }

    function createHighscore($data){
        $html = '';
        if($data){
            foreach ($data as $key) {
                $_SESSION = $key['highscore'];
                $html .='<div id="wpm">Highscore WPM: <p>'.$key['highscore'].'</p></div>';
            }
        }

        echo $html;
    }

    function createView($c){
        $html = '';
        switch ($c) {
            case '1':
            if(isset($_SESSION['user'])){
                if(empty($_SESSION['highscore']) ){
                    $html .='<div id="wpm">Highscore WPM: none <p></p></div>';
                }
            }

            $html .= '
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

                </main>';
                break;
            case '2':
            if(isset($_SESSION['user'])){
                if(!$_SESSION['highscore']){
                    $html .='<div id="wpm">Highscore WPM: none <p></p></div>';
                }
            }

            $html .= '
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
                            <div class="pancakeTop">
                                <div class="pancake p1"></div>
                                <div class="pancake p2"></div>
                                <div class="pancake p3"></div>
                                <div class="pancake p4"></div>
                                <div class="pancake p5"></div>
                                <div class="pancake p6"></div>
                            </div>
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

                </main>';
                break;
            case '3':
                // code...
                break;

            default:
                // code...
                break;
        }

        echo $html;
    }

}

 ?>
