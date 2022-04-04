//ajax requests to php
var resp;
var snackbar;

function ajaxRequests(data, func, phpFunc){
  window.history.pushState('page2', 'Title', 'index.php?=ajax');

    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            resp = JSON.parse(this.response);
            //resp = this.response;
            if(resp.success){
                func(resp);
            } else {
                createSnackbar(resp.message);
            }

        }
    };
    data.func = phpFunc;
    xmlHttp.open("POST", "index.php?=ajax");
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var sendData = JSON.stringify(data);
    //save it under the name of the obj
    xmlHttp.send("data="+encodeURIComponent(sendData));
}
