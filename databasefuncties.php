<?php

function maakVerbinding() {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $databasename = "Klantenservice";
    $connection = mysqli_connect($host, $user, $pass, $databasename);
    return $connection;
}

function selecteerKlanten($connection) {
    $sql = "SELECT nummer, naam, woonplaats FROM klant ORDER BY naam";
    $result = mysqli_fetch_all(mysqli_query($connection, $sql),MYSQLI_ASSOC);
    return $result;
}

function selecteerKlant($connection, $nummer) {
    $statement = mysqli_prepare($connection, "SELECT nummer, naam, woonplaats FROM klant WHERE nummer = ?");
    mysqli_stmt_bind_param($statement, 'i', $nummer);
    mysqli_stmt_execute($statement);
    $statementResult = mysqli_stmt_get_result($statement);
    $result = mysqli_fetch_all($statementResult);
    return $result;
}

function bewerkKlant($connection, $nummer, $naam, $woonplaats){
    $statement = mysqli_prepare($connection, "UPDATE klant SET naam = ?, woonplaats = ? WHERE nummer = ?");
    mysqli_stmt_bind_param($statement, 'ssi', $naam, $woonplaats, $nummer);
    mysqli_stmt_execute($statement);
    return mysqli_stmt_affected_rows($statement) == 1;
}

function sluitVerbinding($connection) {
    mysqli_close($connection);
}
