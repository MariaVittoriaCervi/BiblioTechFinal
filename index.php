<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: view/login.php");
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BiblioTech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="card-header header d-flex align-items-center">
    <img src="img\Logo.png" class="rounded-circle logo" alt="img logo">
    <h1 class="mb-0 ms-3"><b>BiblioTech</b></h1>
    <button class="ms-auto mb-0" style="background-color: rgb(104, 148, 184)"
      onclick="window.location.href='view/account.php'">
      account
    </button>
  </div>


  <div class="main">
    <table class="table table-striped w-50">
      <thead>
        <tr>
          <th scope="col">Country</th>
          <th scope="col">City</th>
          <th scope="col">Address</th>
        </tr>
      </thead>
      <tbody id="locationsTable">

      </tbody>
    </table>
    <div class="card w-50 text-wrap h-100">
      <div class="card">
        <img src="img/libraryImage.jpg" alt="library immage">
        <blockquote class="blockquote mb-0">
          <p id="description">
            With BiblioTech, you have a simple and intuitive tool to efficiently manage your library's books and loans.
            Here you can add new titles to the catalog, check the availability of volumes, and record loans in just a
            few clicks.
            Everything is designed to help you save time, avoid mistakes, and always keep everything under control.
            Whether you manage a single branch or an entire network of libraries, BiblioTech is by your side every day.
            Get started now: your library is in good hands.
          </p>
        </blockquote>
        <div class="btn-group mt-3">
          <a href="view/books.php" class="btn btn-primary">All books</a>
          <a href="view/authors.php" class="btn btn-primary">All authors</a>
          <a href="view/borrow.php?comingFrom=index" class="btn btn-primary">borrow a book</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="js/locations.js"></script>
</body>

</html>