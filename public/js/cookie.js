function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function addcookie() {
    if(getCookie("check_popup") != "true"){
        let cookiediv = document.getElementsByClassName("cookie");
        cookiediv[0].removeAttribute("hidden","");
        cookiediv[1].removeAttribute("hidden","");
        cookiediv[1].classList.add("container");
    }
}

function acceptcookie() {
    document.cookie = "check_popup" + "=" + "true" + ";";
    let cookiediv = document.getElementsByClassName("cookie");
    cookiediv[0].setAttribute("hidden","");
    cookiediv[1].setAttribute("hidden","");
    cookiediv[1].classList.remove("container");
}

function refusecookie() {
    document.cookie = "check_popup" + "=" + "false" + ";";
    let cookiediv = document.getElementsByClassName("cookie");
    cookiediv[0].setAttribute("hidden","");
    cookiediv[1].setAttribute("hidden","");
    cookiediv[1].classList.remove("container");
}
