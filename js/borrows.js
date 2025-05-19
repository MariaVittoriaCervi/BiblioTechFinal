const urlParams = new URLSearchParams(window.location.search);
const id_book = urlParams.get('id_book');
const id_author = urlParams.get('id_author');
const id_location = urlParams.get('id_location');

const oneBookApiUrl = `../controller/controllerOneBook.php?id_book=${id_book}`;
const oneAuthorApiUrl = `../controller/controllerOneAuthor.php?id_author=${id_author}`;
const oneLocationApiUrl = `../controller/controllerOneLocation.php?id_location=${id_location}`;
const locationsFromBookApiUrl = `../controller/controllerLocationsFromBook.php?id_book=${id_book}`;
const locationsFromAuthorApiUrl = `../controller/controllerLocationsFromBook.php?id_book=${id_author}`;
const booksFromAuthorApiUrl = `../controller/controllerBooksFromAuthor.php?id_author=${id_author}`;
const authorsFromLocationApiUrl = `../controller/controllerAuthorsFromLocation.php?id_location=${id_location}`;
const booksFromLocationApiUrl = `../controller/controllerBooksInLocation.php?id_location=${id_location}`;

function whereAreWeComingFrom() {
    if (urlParams.has('id_book')) {
        fetch(oneBookApiUrl)
            .then(response => response.json())
            .then(data => {
                console.log("Dati libro:", data);
                const book = data[0];
                const titleInput = document.getElementById('title');
                const authorInput = document.getElementById('author');

                titleInput.value = book.title;
                titleInput.readOnly = true;

                authorInput.value = book.name;
                authorInput.readOnly = true;
            })
            .catch(error => console.error('Errore nel recupero del libro:', error));

        getLocationsFromBook();
    }
    else if (urlParams.has('id_author')) {
        fetch(oneAuthorApiUrl)
            .then(response => response.json())
            .then(data => {
                console.log("Dati autore:", data);
                const author = data[0];
                const authorInput = document.getElementById('author');
                authorInput.value = author.name;
                authorInput.readOnly = true;
            })
            .catch(error => console.error('Errore nel recupero dell\'autore:', error));
        getLocationsFromAuthor();
        getBooksFromAuthor();
    }
    else if (urlParams.has('id_location')) {
        fetch(oneLocationApiUrl)
            .then(response => response.json())
            .then(data => {
                console.log("Dati location:", data);
                const location = data[0];
                const locationInput = document.getElementById('location');
                locationInput.value = location.address;
                locationInput.readOnly = true;
                getAuthorsFromLocation();
                getBooksFromLocation();
            })
            .catch(error => console.error('Errore nel recupero della location:', error));
    }
}

function getBooksFromLocation() {
    fetch(booksFromLocationApiUrl)
        .then(response => response.json())
        .then(data => {
            console.log("Libri ricevuti", data);
            const bookList = document.getElementById('books');
            bookList.innerHTML = '';
            data.forEach(book => {
                const option = document.createElement('option');
                option.value = book.title;
                bookList.appendChild(option);
            });
        })
        .catch(error => console.error("errore", error));
}

function getAuthorsFromLocation() {
    fetch(authorsFromLocationApiUrl)
        .then(response => response.json())
        .then(data => {
            console.log("autori ricevuti:", data);
            const authorList = document.getElementById('authors');
            authorList.innerHTML = ''; 
            data.forEach(author => {
                const option = document.createElement('option');
                option.value = author.name; // viene mostrato l'indirizzo
                authorList.appendChild(option);
            });
        })
        .catch(error => console.error('Errore nel recupero delle sedi:', error));
}

function getLocationsFromAuthor() {
    fetch(locationsFromAuthorApiUrl)
        .then(response => response.json())
        .then(data => {
            console.log("Sedi ricevute:", data);
            const locationList = document.getElementById('locations');
            locationList.innerHTML = '';
            data.forEach(location => {
                const option = document.createElement('option');
                option.value = location.address; // viene mostrato l'indirizzo
                locationList.appendChild(option);
            });
        })
        .catch(error => console.error('Errore nel recupero delle sedi:', error));
}

function getBooksFromAuthor() {
    fetch(booksFromAuthorApiUrl)
        .then(response => response.json())
        .then(data => {
            console.log("Libri ricevuti", data);
            const bookList = document.getElementById('books');
            bookList.innerHTML = '';
            data.forEach(book => {
                const option = document.createElement('option');
                option.value = book.title; // viene mostrato il titolo
                bookList.appendChild(option);
            });
        })
        .catch(error => console.error("errore", error));
}

function getLocationsFromBook() {
    fetch(locationsFromBookApiUrl)
        .then(response => response.json())
        .then(data => {
            console.log("Sedi ricevute:", data);
            const locationList = document.getElementById('locations');
            locationList.innerHTML = ''; 
            data.forEach(location => {
                const option = document.createElement('option');
                option.value = location.address; // viene mostrato l'indirizzo
                locationList.appendChild(option);
            });
        })
        .catch(error => console.error('Errore nel recupero delle sedi:', error));
}



window.addEventListener("DOMContentLoaded", whereAreWeComingFrom);
