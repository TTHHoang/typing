<?php
require_once('Controllers/Controller.php');
$controller = new Controller($cat);
?>
<?php //$controller->callFunction('createView') ?>

<div class="levelPage">
    <?php
    if(isset($_SESSION['user'])){
        if($_SESSION['user']){
            echo '<a href="?=logout"> <div class="logout">
                    Logout
                </div></a>';
        }
    }
     else {
        echo '<div class="login">
                Login
            </div>';
    }

    ?>
    <div class="levelSelection">
        <div class="level firstLevel">
            <a href="main">First Level</a>
        </div>
        <div class="level secondLevel">
            <a href="main2">Second Level</a>
        </div>
    </div>
    <div id="popupOverlay">
        <div id="popup">
            <div class="loginScreen">
                <div class="close">
                    X
                </div>
                <p>Login</p>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="username" id="loginUsername">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" id="loginPassword">
                <button type="button" name="button" id="loginBtn">Login</button>
            </div>
            <div class="registerScreen">
                <p>Register</p>
                <label for="username">Username</label>
                <input type="text" name="username" pattern="a-zA-Z0-9{12}" id="registerUser" placeholder="username" required>
                <label for="password">Password</label>
                <input type="password" pattern="" name="password" id="registerPassword" placeholder="password" required>
                <label for="password">Repeat password</label>
                <input type="password" pattern="" name="passwordRepeat" id="passwordRepeat" placeholder="password" required>
                <button type="submit" name="button" id="registerBtn">Register</button>
            </div>
        </div>
    </div>
</div>
