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
        <img src="../img\Logo.png" class="rounded-circle logo" alt="img logo">
        <h1><b>BiblioTech</b></h1>
        <button class="ms-auto mb-0" style="background-color: rgb(104, 148, 184)"
            onclick="window.location.href='account.php'">
            account
        </button>
    </div>
    <h2 class="title" style="padding-left: 10px;" id="name">Location's information</h2>
    <div class="location-main">

        <div class="card location-info">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table table-borderless">
                        <tr>
                            <th>Address</th>
                            <td id="address">
                                </th>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td id="city">
                                </th>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td id="country">
                                </th>
                        </tr>
                        <tr>
                    </table>
                    <div class="btn-group mt-3">
                        <a href="borrow.php?id_location=<?php echo urlencode($_GET['id'] ?? ''); ?>"
                            class="btn btn-primary">borrow a book</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="books-table">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Genre</th>
                    </tr>
                </thead>
                <tbody id="locationsTable">

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="../js/location.js"></script>
</body>

</html>