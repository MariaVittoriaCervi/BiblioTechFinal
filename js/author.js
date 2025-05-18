const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const authorApiUrl = `http://localhost/BiblioTechFinal/controller/controllerOneAuthor.php?id_author=${id}`;
const booksApiUrl = `http://localhost/BiblioTechFinal/controller/controllerBooksFromAuthor.php?id_author=${id}`;

function getAuthor() {
  fetch(authorApiUrl)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      popolaAuthor(data);
    })
    .catch(error => console.error("errore", error));
}

function popolaAuthor(data) {
  const author = data[0];  // prendi il primo elemento dell'array
  document.getElementById('name').innerHTML = author.name;
  document.getElementById('nationality').innerHTML = author.nationality;
  document.getElementById('sex').innerHTML = author.sex;
  document.getElementById('image').src = author.picture;
}

function getBooksAuthor() {
  fetch(booksApiUrl)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      const tableContainer = document.getElementById('authorBooksTable');
      popolaBooksAuthor(data, tableContainer);
    })
    .catch(error => console.error("errore", error));
}

function popolaBooksAuthor(data, container) {
  let body = "<tbody>";
  data.forEach(book => {
    body +=
      `<tr>
        <td>${book.title}</td>
        <td>${book.name}</td>
        <td>${book.genre}</td>
        <td>
          <button onclick="window.location.href='book.php?id=${book.id_book}'">
            discover more
          </button>
        </td>

    </tr>`;
  });
  body += "</tbody>";
  container.innerHTML = body; // Inserisce la tabella nel tbody
}


getAuthor();
getBooksAuthor();