const ApiUrl = 'http://localhost/BiblioTechFinal/controller/controllerAllBooks.php';

function getBooks() {
  fetch(ApiUrl)
    .then(response => response.json())
    .then(data => {
      const tableContainer = document.getElementById('booksTable');
      popolaBooks(data, tableContainer);
    })
    .catch(error => console.error("errore", error));
}

function popolaBooks(data, container) {
  let body = "<tbody>";
  data.forEach( book => {
    body +=
      `<tr>
        <td>${book.title}</td>
        <td>${book.name}</td>
        <td>${book.genre}</td>
        <td>${book.original_language}</td>
        <td>
          <button onclick="window.location.href='view/book.html?id=${book.id_book}'">
            discover more
          </button>
        </td>
    </tr>`;
  });
  body += "</tbody>";
  container.innerHTML = body; // Inserisce la tabella nel tbody
}

getBooks();