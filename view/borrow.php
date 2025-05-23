<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$id = $_SESSION['id'];
?>

<!doctype html>
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
    <h2>Borrows</h2>
    <div id="borrow-main">
        <form class="row g-3 needs-validation was-validated" novalidate="">
            <div class="col-md-4">
                <label for="title" class="form-label">Book title</label>
                <!--se si va a questa pagina dalla pagina del libro allora si mette il titolo del libro e lo si rende non modificabile-->
                <input class="form-control" id="title" list="books" placeholder="Type to search book..." required="" />
                <datalist id="books">
                </datalist>

                <div class="invalid-feedback">Select a book</div>
            </div>

            <div class="col-md-4">
                <label for="location" class="form-label">Location</label>
                <!--se si va a questa pagina dalla pagina della sede allora si mette il nome della sede e lo si rende non modificabile-->
                <input class="form-control" id="location" list="locations" placeholder="Type to search location..."
                    required="" />
                <datalist id="locations">

                </datalist>

                <div class="invalid-feedback">Select a location</div>
            </div>

            <div class="col-md-4">
                <label for="author" class="form-label">Author</label>
                <input class="form-control" id="author" list="authors" placeholder="Type to search author..."
                    required="" />
                <datalist id="authors">
                </datalist>

                <div class="invalid-feedback">Select an author</div>
            </div>

            <div class="col-md-4">
                <label for="id" class="form-label">Client's ID</label>
                <div class="input-group has-validation">
                    <input class="form-control" id="id" placeholder="example: 0" aria-describedby="inputGroupPrepend"
                        required="" value="<?php echo htmlspecialchars($id); ?>" readonly />
                    <div class="invalid-feedback">Please choose a valid client ID.</div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="name" class="form-label">Client's name</label>
                <div class="input-group has-validation">
                    <input class="form-control" id="name" placeholder="example: Jonathan"
                        aria-describedby="inputGroupPrepend" required=""
                        value="<?php echo htmlspecialchars($name); ?>" />
                    <div class="invalid-feedback">Please insert a valid name.</div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="mail" class="form-label">Client's email</label>
                <div class="input-group has-validation">
                    <input class="form-control" id="mail" placeholder="example: name.surname@mail.ex"
                        aria-describedby="inputGroupPrepend" required=""
                        value="<?php echo htmlspecialchars($email); ?>" />
                    <div class="invalid-feedback">Please insert a valid mail.</div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Borrow</button>
            </div>
            <div class="form-text">If you don't pick up the book within three days, the borrow will be cancelled.</div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="../js/borrows.js"></script>
</body>

</html>