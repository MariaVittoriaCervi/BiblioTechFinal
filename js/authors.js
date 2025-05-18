const ApiUrl = 'http://localhost/BiblioTechFinal/controller/controllerAllAuthors.php';

function getAuthors() {
  fetch(ApiUrl)
    .then(response => response.json())
    .then(data => {
      const tableContainer = document.getElementById('authorsTable');
      popolaLocations(data, tableContainer);
    })
    .catch(error => console.error("errore", error));
}

function popolaLocations(data, container) {
  let body = "<tbody>";
  data.forEach(author => {
    body +=
      `<tr>
        <td>${author.name}</td>
        <td>${author.nationality}</td>
        <td>${author.sex}</td>
        <td>
          <button onclick="window.location.href='author.html?id=${author.id_author}'">
            discover more
          </button>
        </td>
    </tr>`;
  });
  body += "</tbody>";
  container.innerHTML = body; // Inserisce la tabella nel tbody
}

getAuthors();