<?php

$url = "https://dog.ceo/api/breeds/list/all";
$response = json_decode(file_get_contents($url), true);
//datos de la BD
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "perros";
//Abrimos la conexión
$connection = mysqli_connect($hostname , $user , $password);
//elegimos BD
mysqli_select_db ($connection, $db);

foreach ($response['message'] as $raza => $subrazas) {
    if (count($subrazas) > 0) {
        foreach ($subrazas as $subraza) {
            $nombreraza = $subraza . ' ' . $raza;
            $urlimagen = "https://dog.ceo/api/breed/" . $raza . "/" . $subraza . "/images/random";
            echo $nombreraza . " su URL es " . $urlimagen;
            echo "<br>";
            mysqli_query($connection, "INSERT INTO raza (nombre) values ('$nombreraza','$urlimagen');");
        }
    } else {
        $urlimagen = "https://dog.ceo/api/breed/" . $raza . "/images/random";
        echo $raza . " su URL es " . $urlimagen;
        echo "<br>";
    }
}

?>