function loadAuthorDetails(authorId) {
    fetch(`/author/${authorId}/details`)
      .then(response => response.json())
      .then(data => {
        document.getElementById('title').textContent = data.title;
        document.getElementById('authorName').textContent = data.name;
        document.getElementById('genre').textContent = data.genre;
        document.getElementById('lagnuage').textContent = data.original_language;
        document.getElementById('comment').textContent = data.comment
        document.getElementById('plot').textContent = data.plot;
        document.getElementById('image').src = data.cover;
        document.getElementById('image').alt = data.title + ' - ' + data.name;
      })
      .catch(error => console.error('Errore nel caricamento autore:', error));
  }