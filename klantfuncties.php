<?php
include 'databasefuncties.php';
$gegevens = array("nummer" => 0, "naam" => "", "woonplaats" => "", "melding" => "");

function alleKlantenOpvragen() {
    $connection = maakVerbinding();
    $klanten = selecteerKlanten($connection);
    sluitVerbinding($connection);
    return $klanten;
}

function toonKlantenOpHetScherm($klanten) {
    foreach ($klanten as $klant) {
        print("<tr>");
        print("<td>".$klant["nummer"]."</td>");
        print("<td>".$klant["naam"]."</td>");
        print("<td>".$klant["woonplaats"]."</td>");
        print("<td><a type='button' class='btn btn-sm btn-warning text-light' href=\"BewerkenKlant.php?nummer=".$klant["nummer"]."\">Bewerk</a> <a type='button' class='btn btn-sm btn-danger' href=\"verwijderklant.php?nummer=".$klant["nummer"]."\">Verwijder</a></td>");
        print("</tr>");
    }
}

function klantGegevensToevoegen($gegevens) {
    $connection = maakVerbinding();
    if (voegKlantToe($connection, $gegevens["naam"], $gegevens["woonplaats"]) == True) {
        $gegevens["melding"] = "<div class='alert alert-success'>De klant is succesvol toegevoegd.</div>";
    } else {
        $gegevens["melding"] = "<div class='alert alert-danger'>Het toevoegen is mislukt.</div>";
    }
    sluitVerbinding($connection);
    return $gegevens;
}

function voegKlantToe($connection, $naam, $woonplaats) {
    $statement = mysqli_prepare($connection, "INSERT INTO klant (naam, woonplaats) VALUES(?,?)");
    mysqli_stmt_bind_param($statement, 'ss', $naam, $woonplaats);
    mysqli_stmt_execute($statement);
    return mysqli_stmt_affected_rows($statement) == 1;
}

function krijgKlant($nummer){
    $connection = maakVerbinding();
    $klant = selecteerKlant($connection, $nummer);
    sluitVerbinding($connection);
    return $klant;
}

function klantBewerken($nummer, $naam, $woonplaats){
    $connection = maakVerbinding();
    if(bewerkKlant($connection, $nummer, $naam, $woonplaats)){
        return true;
    }else{
        return false;
    }
}

function verwijderKlant($nummer){
    $connection = maakVerbinding();
    $statement = mysqli_prepare($connection, "DELETE FROM klant WHERE nummer = ?");
    mysqli_stmt_bind_param($statement, 'i', $nummer);
    mysqli_stmt_execute($statement);
    sluitVerbinding($connection);
    return mysqli_stmt_affected_rows($statement) == 1;
}
