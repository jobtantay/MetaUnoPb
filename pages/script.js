var a = document.getElementById("loginBtn");
var b = document.getElementById("registerBtn");
var x = document.getElementById("login");
var y = document.getElementById("register");

function login() {
    x.style.left = "4px";
    x.style.opacity = "1";
    x.style.pointerEvents = "auto";

    y.style.right = "-520px";
    y.style.opacity = "0";
    y.style.pointerEvents = "none";

    a.className = "btn white-btn";  // loginBtn classes
    b.className = "btn";            // registerBtn classes
}

function register() {
    x.style.left = "-510px";
    x.style.opacity = "0";
    x.style.pointerEvents = "none";

    y.style.right = "5px";
    y.style.opacity = "1";
    y.style.pointerEvents = "auto";

    a.className = "btn";            // loginBtn classes
    b.className = "btn white-btn";  // registerBtn classes
}


window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const view = urlParams.get('view');

    if (view === 'register') {
        register();
    } else {
        login();
    }
};