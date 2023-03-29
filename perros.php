<?php
// Hacemos la petición a la API
$url = "https://dog.ceo/api/breeds/list/all";
$response = json_decode(file_get_contents($url), true);

// Inicializamos el array asociativo
$breeds = array();
// Recorremos el resultado y agregamos las razas y sus URLs de imagen al array
foreach ($response['message'] as $breed => $subBreeds) {
    if (count($subBreeds) > 0) {
        foreach ($subBreeds as $subBreed) {
            $breedName = $subBreed . ' ' . $breed;
            $imageUrl = "https://dog.ceo/api/breed/" . $breed . "/" . $subBreed . "/images/random";
            $breeds[$breedName] = $imageUrl;
        }
    } else {
        $imageUrl = "https://dog.ceo/api/breed/" . $breed . "/images/random";
        $breeds[$breed] = $imageUrl;
    }
}
$keys=array_keys($breeds);
foreach($keys as $key){
    echo $key;
    echo "<br>";
}
// Imprimimos el resultado
print_r($keys);
?>