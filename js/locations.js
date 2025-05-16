function loadLocations() {
  console.log('Caricamento delle posizioni...');
  fetch('locations/all')
    .then(response => response.json())
    .then(data => {
      console.log('Dati ricevuti:', data);
      const tbody = document.getElementById('locationsTable');
      tbody.innerHTML = '';
      data.forEach(location => {
        const row = `
                  <tr>
                      <td>${location.country}</td>
                      <td>${location.city}</td>
                      <td>${location.address}</td>
                  </tr>`;
        tbody.innerHTML += row;
      });
    })
    .catch(error => console.error('Errore nel recupero dei dati:', error));
}

window.addEventListener('DOMContentLoaded', loadLocations);
