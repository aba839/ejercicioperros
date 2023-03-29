<?php

$url = "https://dog.ceo/api/breeds/list/all";
$response = json_decode(file_get_contents($url), true);


foreach ($response['message'] as $raza => $subrazas) {
    if (count($subrazas) > 0) {
        foreach ($subrazas as $subraza) {
            $nombreraza = $subraza . ' ' . $raza;
            $urlimagen = "https://dog.ceo/api/breed/" . $raza . "/" . $subraza . "/images/random";
            echo $nombreraza . " su URL es " . $urlimagen;
            echo "<br>";
        }
    } else {
        $urlimagen = "https://dog.ceo/api/breed/" . $raza . "/images/random";
        echo $raza . " su URL es " . $urlimagen;
        echo "<br>";
    }
}

?>