// ajouter les get dont on a besoin
const allGet = [
    "category",
]

function $_GET(param) {
    let vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

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

    let get = [];

    allGet.forEach(element =>
    {
        get[element] = $_GET(element)
    })

    for(let element in get) {
        if (get[element] !== null) {
            form.action += '&' + element + '=' + get[element];
        }
    }

    // Enlever la valeur au bouton
    document.getElementById(page + 'Button').value = "";

    // Enlever le message d'erreur
    if (document.getElementById('errors') !== null) {
        document.getElementById('errors').style.display = "none"
    }
}

function updateUser(id) {

    // Attribuer la valeur au bouton
    document.getElementById('userButtonUpdate').value = id.toString();

    document.getElementById('emailInputUpdate').value = document.getElementById('email-' + id).innerText
}

function update(page, id) {
    console.log(page);
    // Remplir les champs des 'modals';
    let category = document.getElementsByClassName(page + '-' + id);
    let arr = [].slice.call(category);

    arr.forEach(element =>
        fillInInput(element)
    );

    // Mettre à jour le titre;
    document.getElementById(page + 'Title').innerHTML = "Update a " + page;

    // Mettre à jour le form;
    let form = document.querySelector('form');
    form.action = '?page=' + page + '&action=update';

    // Attribuer la valeur au bouton
    document.getElementById(page + 'Button').value = id.toString();

    // Enlever le message d'erreur
    if (document.getElementById('errors') !== null) {
        document.getElementById('errors').style.display = "none"
    }}

// à implémenter au besoin les checkbox ...
function fillInInput(element) {
    if (element.id === "id") {
        return;
    }

    console.log(element.id)

    document.getElementById(element.id + 'Input').value = element.innerText;


}

// à implémenter au besoin les checkbox ...
function emptyingInput(element) {
    element.value = "";
}