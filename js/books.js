function loadBooks() {
    fetch('/books/all')
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('BooksTable');
        tbody.innerHTML = '';
        data.forEach(book => {
          const row = `
            <tr>
              <td>${book.title}</td>
              <td>${book.original_language}</td>
              <td>${book.genre}</td>
              <td>${book.comment}</td>
              <td><a href="/author/${book.author_id}">${book.name}</a></td> <!-- nome dell'autore -->
            </tr>`;
          tbody.innerHTML += row;
        });
      })
      .catch(error => console.error('Errore nel recupero dei dati:', error));
  }
  window.addEventListener('DOMContentLoaded', loadBooks);