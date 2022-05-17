let cart = [];

//redirect logo
function redirectpanier() {
    if (cart[0] == undefined) {
        return;
    } else {
        window.location.href = '/panier';
    }
}

//retrieve
function loadcart() {
    var cartx = getCookie("cartsave");
    if (cartx == "") {
        displaycount()
        return;
    }
    cartx = JSON.parse(cartx);
    cart = cartx;
    displaycount();
}

function savecart() {
    document.cookie = "cartsave=" + JSON.stringify(cart) + ";path=/";
}

function displaycount() {
    var counter = document.getElementById('count');
    var total = 0;
    if (cart.length != 0) {
        cart.forEach((cart) => {
            total += cart.quant;
        });
    }
    if (total > 0) {
        counter.innerHTML = total;
        counter.removeAttribute("hidden", "");
    }
}

//catalogue
function shortadd(id, max) {
    var i = 0;
    if (max == 0) {
        return;
    }
    if (cart[i] != null) {
        while (i != cart.length && cart[i] != undefined && cart[i].id != id) {
            i++;
        }
        if (cart[i] != undefined && cart[i].id == id) {
            if (cart[i].quant + 1 > max) {
                return;
            }
            cart[i].quant++;
            displaycount()
            savecart();
            return;
        }
    }
    cart.push({
        id: id,
        quant: 1
    });
    displaycount()
    savecart();
}

//product
function productquant(num, max) {
    var number = document.getElementById("quant");
    quant = number.innerHTML;
    quant = parseInt(quant);
    quant += num;
    if (quant > max) {
        quant = max;
    }
    if (quant > 1) {
        number.innerHTML = quant;
    } else {
        if (quant < 1) {
            quant = 1;
        }
        number.innerHTML = quant;
    }
}

function addproductquant(id, max) {
    var i = 0;
    var number = document.getElementById("quant");
    num = number.innerHTML;
    num = parseInt(num);
    if (cart[i] != null) {
        while (i != cart.length && cart[i] != undefined && cart[i].id != id) {
            i++;
        }
        if (cart[i] != undefined && cart[i].id == id) {
            if (cart[i].quant + num > max) {
                cart[i].quant = max;
            } else {
                cart[i].quant += num;
            }
            displaycount()
            savecart();
            window.location.href = '/catalogue';
            return;
        }
    }
    cart.push({
        id: id,
        quant: num
    });
    displaycount()
    savecart();
    window.location.href = '/catalogue';
}

//cart
if (window.location.href.match('/panier') != null) {
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            total();
        }, 1000);
    });
}

function addincart(num, id, max) {
    var i = 0;
    var product = document.getElementsByClassName("quant");
    for (i = 0; i < cart.length; i++) {
        if (cart[i].id == id) {
            quant = product[i].innerHTML;
            quant = parseInt(quant);
            quant += num;
            if (quant >= max) {
                quant = max;
            }
            if (quant > 1) {
                product[i].innerHTML = quant;
                cart[i].quant = quant;
            } else {
                if (quant < 1) {
                    quant = 1;
                }
                product[i].innerHTML = quant;
                cart[i].quant = quant;
            }
            displaycount()
            savecart();
            total();
        }
    }
}

function remove(id) {
    var product = document.getElementsByClassName("product");
    for (i = 0; i < cart.length; i++) {
        if (cart[i].id == id) {
            cart.splice(i, 1);
            product[i].remove();
        }
    }
    savecart();
    total();
    if (cart.length == 0) {
        setCookie('cartsave', '', -1);
        window.location.href = '/catalogue';
    }
}

//price
function total() {
    var totalprice = 0;
    var total = document.getElementById("total");
    var price = document.getElementsByClassName("price");
    console.log(cart.length);

    for (i = 0; i < cart.length; i++) {
        console.log("yes");
        var a = parseInt(price[i].innerHTML);
        totalprice += cart[i].quant * a;
    }
    total.innerHTML = totalprice+" &euro;";
}

function send() {
    document.cookie = "cartsave" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    window.location.href = '/catalogue';
}
