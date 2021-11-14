<?php
include 'klantfuncties.php';
if (isset($_GET["toevoegen"])) {
    $gegevens["naam"] = isset($_GET["naam"]) ? $_GET["naam"] : "";
    $gegevens["woonplaats"] = isset($_GET["woonplaats"]) ? $_GET["woonplaats"] : "";
    $gegevens = klantGegevensToevoegen($gegevens);
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Toevoegen Klant</title>
</head>
<body>
<div class="header">
    <h1>Toevoegen Klant</h1>
</div>
<hr>
<div class="container container-sm">
    <form method="get" action="toevoegenklant.php">
        <label for="Naam1" class="form-label">Naam</label>
        <input type="text" name="naam" id="Naam1" class="form-control">
        <label for="Woonplaats1" class="form-label">Woonplaats</label>
        <input type="text" name="woonplaats" id="Woonplaats1" class="form-control">
        <br><input type="submit" class="form-submit btn btn-success" value="Toevoegen" name="toevoegen"> <a role="button" class="btn btn-danger text-light" href="BekijkenOverzicht.php">Annuleren</a> <a role="button" class="btn btn-info text-light" href="BekijkenOverzicht.php">Terug Naar Overzicht</a>
    </form><hr>
    <?php print($gegevens["melding"]); ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>