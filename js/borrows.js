function loadAuthorFromBook() {
    fetch('/authors/all')
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('authorsTable');
        tbody.innerHTML = '';
        data.forEach(author => {
          const row = `
            <tr>
              <td>${author.name}</td>
              <td>${author.nationality}</td>
              <td>${author.sex}</td>
            </tr>`;
          tbody.innerHTML += row;
        });
      })
      .catch(error => console.error('Errore nel recupero dei dati:', error));
  }

  window.addEventListener('DOMContentLoaded', loadAuthors);