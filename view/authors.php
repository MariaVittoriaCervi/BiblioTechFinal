<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BiblioTech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <div class="card-header header">
    <img src="..\img\Logo.png" class="rounded-circle logo" alt="img logo">
    <h1><b>BiblioTech</b></h1>
    <button class="ms-auto mb-0" style="background-color: rgb(104, 148, 184)"
      onclick="window.location.href='account.php'">
      Account
    </button>
  </div>
  <h2>List of all the authors that have at least a book</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Nationality</th>
        <th scope="col">Sex</th>
      </tr>
    </thead>
    <tbody id="authorsTable"></tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="../js/authors.js"></script>
</body>

</html>