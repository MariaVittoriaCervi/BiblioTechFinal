const ApiUrl = 'http://localhost/BiblioTechFinal/controller/controllerAllLocations.php';

function getLocations() {
  fetch(ApiUrl)
    .then(response => response.json())
    .then(data => {
      const tableContainer = document.getElementById('locationsTable');
      popolaLocations(data, tableContainer);
    })
    .catch(error => console.error("errore", error));
}

function popolaLocations(data, container) {
  let body = "<tbody>";
  data.forEach(location => {
    body +=
      `<tr>
        <td>${location.country}</td>
        <td>${location.city}</td>
        <td>${location.address}</td>
        <td>
          <button onclick="window.location.href='view/location.html?id=${location.id_location}'">
            visit
          </button>
        </td>

    </tr>`;
  });
  body += "</tbody>";
  container.innerHTML = body; // Inserisce la tabella nel tbody
}

getLocations();