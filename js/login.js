var loginShow;
var overlay;
var closeBtn;
var registerBtn;
var popup;

window.onload = function() {
    loginShow = document.getElementsByClassName('login')[0];
    closeBtn = document.getElementsByClassName('close')[0];
    logout = document.getElementsByClassName('logout')[0];
    
    if(loginShow){
        loginShow.addEventListener('click', showPopup);
    }
    overlay = document.getElementById('popupOverlay');
    overlay.addEventListener('click', hidePopup);
    closeBtn.addEventListener('click', hidePopup);
    registerBtn = document.getElementById('registerBtn');
    registerBtn.addEventListener('click', register);
    popup = document.getElementById('popup');
    loginBtn = document.getElementById('loginBtn');
    loginBtn.addEventListener('click', login);

    document.getElementById('popup').addEventListener('click',function (event){
       event.stopPropagation();
    });
}

function showPopup(){
    overlay.style.opacity = '1';
    overlay.style.zIndex = '2';
    setTimeout(function(){
        popup.style.top = "50%";
    }, 300);
}

function hidePopup(){
    window.history.pushState('page2', 'Title', 'index.php');
    overlay.style.opacity = '0';
    overlay.style.zIndex = '-2';
    popup.style.top = "";
}

function register(){
    var data = {};
    var username = document.getElementById('registerUser').value;
    var password = document.getElementById('registerPassword').value;
    var repeatPassword = document.getElementById('passwordRepeat').value;
    data = {
        username: username,
        password: password
    }

    if(data.username !== '' && data.password !== ''){
        if(data.password == repeatPassword){
            if(/^[a-zA-Z0-9]{0,12}$/.test(data.username)){
                ajaxRequests(data, registrationSuccess, 'register');
            } else {
                createSnackbar("Numbers and letters only");
            }
        } else {
            createSnackbar("Password not matching");
        }

    }else {
        createSnackbar("Fill in all the fields");
    }
}

function registrationSuccess(resp){
    createSnackbar("You have been registered, reloading page..");
    window.history.pushState('page2', 'Title', 'index.php');
    setTimeout(function(){
        location.reload();
    }, 2400);
}

function login(){
    var data = {};
    var loginUsername = document.getElementById('loginUsername').value;
    var loginPassword = document.getElementById('loginPassword').value;
    data = {
        username: loginUsername,
        password: loginPassword
    }

    if(data.username !== '' && data.password !== ''){
            if(/^[a-zA-Z0-9]{0,12}$/.test(data.username)){
                ajaxRequests(data, loginSuccess, 'login');
            } else {
                createSnackbar("Numbers and letters only");
            }
        }
    else {
        createSnackbar("Fill in all the fields");
    }
}

function loginSuccess(){
    createSnackbar("Login success! Reloading..");
    window.history.pushState('page2', 'Title', 'index.php');
    setTimeout(function(){
        location.reload();
    }, 2400);

}
