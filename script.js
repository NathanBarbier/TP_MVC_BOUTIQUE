function create (page) {
    // Vider tous les champs des 'modals';
    let inputs = document.getElementsByClassName(page + 'Input')
    let arr = [].slice.call(inputs);

    arr.forEach(element =>
        emptyingInput(element)
    );

    // Mettre à jour le titre;
    document.getElementById(page + 'Title').innerHTML = "Create a " + page;

    // Mettre à jour le form;
    let form = document.querySelector('form');
    form.action = '?page=' + page + '&action=create';
}

function update(page, id) {
    // Remplir les champs des 'modals';
    let category = document.getElementsByClassName('category-' + id);
    let arr = [].slice.call(category);

    arr.forEach(element =>
        fillInInput(element)
    );

    // Mettre à jour le titre;
    document.getElementById(page + 'Title').innerHTML = "Update a " + page;

    // Mettre à jour le form;
    let form = document.querySelector('form');
    form.action = '?page=' + page + '&action=update';
}

// à implémenter au besoin les checkbox/select/radio ...
function fillInInput(element) {
    if (element.id === "id") {
        return;
    }

    document.getElementById(element.id + 'Input').value = element.innerText;
}

// à implémenter au besoin les checkbox/select/radio ...
function emptyingInput(element) {
    element.value = "";
}