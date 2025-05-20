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
  <div class="card-header header d-flex align-items-center">
    <a href="../index.php">
      <img src="../img/Logo.png" class="rounded-circle logo" alt="img logo">
    </a>
    <h1 class="mb-0 ms-3"><b>BiblioTech</b></h1>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <h5 class="card-title mb-1">
                <strong><?php echo htmlspecialchars($_SESSION['name']); ?></strong>
              </h5>
              <p class="card-text mb-0">
                <small class="text-muted"><?php echo htmlspecialchars($_SESSION['email']); ?></small>
              </p>
            </div>
            <form action="../controller/controllerLogout.php" method="post" class="m-0">
              <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
          </div>
        </div>
        <br>
        <div class="card shadow-sm">
          <h2>Your borrows list</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Book</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
              </tr>
            </thead>
            <tbody id="borrowsTable"> </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="../js/account.js"></script>
</body>

</html>