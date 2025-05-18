const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const ApiUrl = `http://localhost/BiblioTechFinal/controller/controllerOneBook.php?id_book=${id}`;

function getBook() {
  fetch(ApiUrl)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      popolaBook(data);
    })
    .catch(error => console.error("errore", error));
}

function popolaBook(data) {
  const book = data[0];  // prendi il primo elemento dell'array
  document.getElementById('title').innerHTML = book.title;
  document.getElementById('authorName').innerHTML = book.name;
  document.getElementById('genre').innerHTML = book.genre;
  document.getElementById('language').innerHTML = book.original_language;
  document.getElementById('comment').innerHTML = book.comment;
  document.getElementById('plot').innerHTML = book.plot;
  document.getElementById('bookCover').src = book.cover;
  const table = document.querySelector("table");
  table.style.display = "none";
  table.offsetHeight; // forza il reflow
  table.style.display = "table";
}

getBook();