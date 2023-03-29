
<?php
$people_json = file_get_contents('https://dog.ceo/api/breeds/list/all');
$decoded_json = json_decode($people_json, true);
//var_dump($decoded_json);
$results= $decoded_json["message"];
//var_dump($results);

$razas=array_keys($results);
$subrazas=array_values($results);
var_dump($subrazas);
foreach($razas as $raza){
    //var_dump ($result);
    echo $raza;
    echo "<br>";
}


?>