const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const apiUrl = `http://localhost/BiblioTechFinal/controller/controllerOneLocation.php?id_location=${id}`;

function getLocation() {
  fetch(apiUrl)
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


getLocation();