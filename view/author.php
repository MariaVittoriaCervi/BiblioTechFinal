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
        <img src="../img\Logo.png" class="rounded-circle logo" alt="img logo">
        <h1 class="mb-0 ms-3"><b>BiblioTech</b></h1>
        <button class="ms-auto mb-0" style="background-color: rgb(104, 148, 184)"
            onclick="window.location.href='account.php'">
            account
        </button>
    </div>

    <div class="book-main">
        <img src="../img/404.jpg" id="image" alt="author image" class="rounded-2 cover">
        <div class="informations">
            <h2 class="title" id="name">Name</h2>
            <div class="details">
                <div class="card info">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nationality</th>
                                    <td id="nationality">
                                        </th>
                                </tr>
                                <tr>
                                    <th>Sex</th>
                                    <td id="sex">
                                        </th>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="additional-info">
                    <h3>books</h3>
                    <table class="table table-striped">
                        <thead id="authorBooksTable">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Original language</th>
                                <th scope="col">Genre</th>
                            </tr>
                        </thead>
                        <tbody id="booksTable"> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="../js/author.js"></script>
    <script src="../js/logout.js"></script>
</body>

</html>