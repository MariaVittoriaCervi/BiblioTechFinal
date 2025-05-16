function loadAuthorDetails(authorId) {
    fetch(`/author/${authorId}/details`)
      .then(response => response.json())
      .then(data => {
        console.log('Dettagli autore:', data);
        // Puoi poi usarli per riempire il DOM
        document.getElementById('name').textContent = data.name;
        document.getElementById('nationality').textContent = data.nationality;
        document.getElementById('sex').textContent = data.sex;
        document.getElementById('comment').textContent = data.comment;
        document.getElementById('image').src = data.picture;
        document.getElementById('image').alt = data.name;
      })
      .catch(error => console.error('Errore nel caricamento autore:', error));
  }

  function loadauthorBooks(authorId) {
    fetch(`/author/${authorId}/books`)
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('BooksTable');
        tbody.innerHTML = '';
        data.forEach(book => {
          const row = `
            <tr>
                <td><a href="/book/${book.id_book}">${book.title}</a></td>
              <td>${book.title}</td>
              <td>${book.original_language}</td>
              <td>${book.genre}</td>
              <td>${book.comment}</td>
              <td>${book.name}</td> <!-- nome dell'autore -->
            </tr>`;
          tbody.innerHTML += row;
        });
      })
      .catch(error => console.error('Errore nel recupero dei dati:', error));
  }
  
  document.addEventListener('DOMContentLoaded', () => {
    const authorId = window.location.pathname.split('/')[2];
    loadauthorBooks(authorId);
  });
  

  document.addEventListener('DOMContentLoaded', () => {
    const urlParts = window.location.pathname.split('/');
    const authorId = urlParts[2];
    loadAuthorDetails(authorId);
  });
  