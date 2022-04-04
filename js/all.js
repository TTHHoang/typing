function createSnackbar(msg){

    if(!document.body.contains(snackbar)){
        snackbar = document.createElement('div');
        snackbar.id = 'snackbar';
        snackbar.innerText = msg;
        document.body.appendChild(snackbar);
        setTimeout(function(){
            snackbar.style.top = '0px';
        }, 100);
        setTimeout(removeSnackbar, 2500);
    }
}

function removeSnackbar(){
    snackbar.style.top = '-200px';
    setTimeout(function(){
        document.body.removeChild(snackbar);
    }, 700);
}
