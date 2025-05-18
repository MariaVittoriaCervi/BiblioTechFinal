const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const locationApiUrl = `http://localhost/BiblioTechFinal/controller/controllerOneLocation.php?id_location=${id}`;
const booksApiUrl = `http://localhost/BiblioTechFinal/controller/controllerBooksInLocation.php?id_location=${id}`;

function getLocation() {
  fetch(locationApiUrl)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      popolaLocation(data);
    })
    .catch(error => console.error("errore", error));
}

function popolaLocation(data) {
  const location = data[0];  // prendi il primo elemento dell'array
  document.getElementById('address').innerHTML = location.address;
  document.getElementById('city').innerHTML = location.city;
  document.getElementById('country').innerHTML = location.country;
}
//----------------------------------------------------------------------------------------------------------------------------

function getBooksLocation() {
  fetch(booksApiUrl)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      const tableContainer = document.getElementById('locationsTable');
      popolaBooksLocation(data, tableContainer);
    })
    .catch(error => console.error("errore", error));
}

function popolaBooksLocation(data, container) {
  let body = "<tbody>";
  data.forEach(book => {
    body +=
      `<tr>
        <td>${book.title}</td>
        <td>${book.original_language}</td>
        <td>${book.genre}</td>
        <td>
          <button onclick="window.location.href='book.html?id=${book.id_book}'">
            discover more
          </button>
        </td>

    </tr>`;
  });
  body += "</tbody>";
  container.innerHTML = body; // Inserisce la tabella nel tbody
}


getLocation();
getBooksLocation();