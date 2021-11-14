<?php
include 'klantfuncties.php';

if(isset($_GET['nummer'])){
    $klantnummer = $_GET['nummer'];
}else{
    die("Er is geen klant geselecteerd.");
}
$isValid = "";
$bewerkt = 0;
if(isset($_POST['KlantNaam']) && isset($_POST['KlantWoonplaats'])){
    if(klantBewerken($_GET['nummer'], $_POST['KlantNaam'], $_POST['KlantWoonplaats'])){
        $bewerkt = 1;
        $isValid = "is-valid";
    }else{
        $bewerkt = 2;
    }
}
$klanten = krijgKlant($klantnummer);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Bewerken Klant</title>
</head>
<body>
<div class="header">
    <h1>Bewerken Klant</h1>
</div>
<hr>
<?php
foreach ($klanten as $klant){
    $klantNummer = $klant[0];
    $klantNaam = $klant[1];
    $klantWoonplaats = $klant[2];
}
?>
<div class="container container-sm">
<form method="post">
    <label for="Nummer1" class="form-label">Nummer</label>
    <input type="text" id="Nummer1" class="form-control" value="<?php print($klantNummer); ?>" readonly>
    <label for="Naam1" class="form-label">Naam</label>
    <input type="text" name="KlantNaam" id="Naam1" class="form-control <?php print($isValid) ?>" value="<?php print($klantNaam); ?>">
    <label for="Woonplaats1" class="form-label">Woonplaats</label>
    <input type="text" name="KlantWoonplaats" id="Woonplaats1" class="form-control <?php print($isValid) ?>" value="<?php print($klantWoonplaats); ?>">
    <br><input type="submit" class="form-submit btn btn-success" value="Bewerken"> <a role="button" class="btn btn-info text-light" href="BekijkenOverzicht.php">Terug Naar Overzicht</a>
</form><hr>
    <?php
    if($bewerkt == 1){
        print("<div class='alert alert-success'>De klant is succesvol bewerkt.</div>");
    }else if($bewerkt == 2){
        print("<div class='alert alert-danger'>De klant bewerken is mislukt.</div>");
    }

    ?>
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