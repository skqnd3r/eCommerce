var switcher = 0;

function updateform() {
    var container = document.getElementById('update');
    var button = document.getElementById('updatebutton');

    if (switcher == 1) {
        container.setAttribute("class", "container");
        container.removeAttribute("hidden", "");
        button.innerHTML = 'Annuler';
        switcher = 0;
        return;
    }
    if (switcher == 0) {
        container.setAttribute("hidden", "");
        container.removeAttribute("class", "container");
        button.innerHTML = 'Modifier';
        switcher = 1;
        return;
    }
}