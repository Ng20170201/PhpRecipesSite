<?php

$id = $_GET['IDVrste'];


include "konekcija.php";
include "domain/recepti.php";
include "domain/vrste.php";

$result=Recept::vratiSve($mysqli, " where v.IDVrste =".$id);

 $nalepi = '<table class="table "><thead><tr><th>Naziv</th><th>Ocena</th><th>Opis</th><th>Vrsta recepta</th></thead><tbody>';

 foreach($result as $receptii){
    $nalepi=$nalepi.'<tr>';
    $nalepi=$nalepi.'<td>'.$receptii->naziv.'</td>';
    $nalepi=$nalepi.'<td>'.$receptii->ocena.'</td>';
    $nalepi=$nalepi.'<td>'.$receptii->opis.'</td>';
    $nalepi=$nalepi.'<td>'.$receptii->vrsta->NazivVrste.'</td>';
    $nalepi=$nalepi.'</tr>';
 }
 
$nalepi=$nalepi.'</tbody></table>';          


echo($nalepi);


 ?>