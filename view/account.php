<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: view/login.php");
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
  <div class="card-header header d-flex align-items-center">
    <img src="img\Logo.png" class="rounded-circle logo" alt="img logo">
    <h1 class="mb-0 ms-3"><b>BiblioTech</b></h1>
    <button class="ms-auto mb-0" style="background-color: rgb(104, 148, 184)"
      onclick="window.location.href='view/account.php'">
      account
    </button>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="../js/authors.js"></script>
  <script src="../js/logout.js"></script>
</body>

</html>