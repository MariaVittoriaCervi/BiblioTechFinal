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
    <div class="container mt-4">
        <div class="row">
            <!-- Colonna sinistra: Titolo + info + bottone -->
            <div class="col-md-8">
                <h2 class="title" id="title"></h2>

                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th>Author</th>
                                    <td id="authorName"></td>
                                </tr>
                                <tr>
                                    <th>Genre</th>
                                    <td id="genre"></td>
                                </tr>
                                <tr>
                                    <th>Original language</th>
                                    <td id="language"></td>
                                </tr>
                                <tr>
                                    <th>Comment</th>
                                    <td id="comment"></td>
                                </tr>
                            </table>
                        </li>
                        <li class="list-group-item text-center">
                            <a href="borrow.php?id_book=<?php echo urlencode($_GET['id'] ?? ''); ?>"
                                class="btn btn-primary btn-lg">Borrow</a>
                        </li>
                    </ul>
                </div>

                <div class="additional-info">
                    <h3>Plot</h3>
                    <p id="plot" class="text-justify"></p>
                </div>
            </div>

            <!-- Colonna destra: Copertina -->
            <div class="col-md-4 text-center">
                <img src="../img/404.jpg" alt="cover image" class="img-fluid rounded-2" id="bookCover">
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="../js/book.js"></script>
</body>

</html>