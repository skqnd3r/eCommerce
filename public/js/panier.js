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