const borrowsApiUrl = '../controller/controllerClientBorrows.php';
const logoutApiUrl = '../controller/controllerLogout.php';

function getBorrows() {
  fetch(ApiUrl)
    .then(response => response.json())
    .then(data => {
      const tableContainer = document.getElementById('borrowsTable');
      popolaBorrows(data, tableContainer);
    })
    .catch(error => console.error("errore", error));
}

function popolaBorrows(data, container) {
  let body = "<tbody>";
  data.forEach(borrow => {
    body +=
      `<tr>
        <td>${borrow.title}</td>
        <td>${borrow.date_start}</td>
        <td>${borrow.date_end}</td>
    </tr>`;
  });
  body += "</tbody>";
  container.innerHTML = body; // Inserisce la tabella nel tbody
}


document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("logoutBtn").addEventListener("click", logout);
});
getBorrows();