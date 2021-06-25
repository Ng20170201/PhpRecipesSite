<?php  
 //sort.php  
 include "konekcija.php";
 include "domain/recepti.php";
 include "domain/vrste.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $igrice = Recept::vratiSve($mysqli,$uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>

        <th><a class="column_sort" id="ocena" data-order="'.$order.'" href="#">Ocena</a></th>
        <th><a class="column_sort" id="opis" data-order="'.$order.'" href="#">Opis</a></th>
        <th>Vrsta recepta</th>
        <th>Opcije</th>     
      </tr>  
 ';  
 foreach($recepti as $recepti){
    $output=$output.'<tr>';
    $output=$output.'<td>'.$recepti->naziv.'</td>';
    $output=$output.'<td>'.$recepti->ocena.'</td>';
    $output=$output.'<td>'.$recepti->opis.'</td>';
    $output=$output.'<td>'.$recepti->vrsta->NazivVrste.'</td>';
    $output=$output.'<td><a href="brisanjeigrice.php?id='.$recepti->IDRecepta.'">
    <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
</a>
<a href="IzmenaRecepta.php?id='.$recepti->IDRecepta.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
</a></td>';
    $output=$output.'</tr>';
 }
 $output .= '</tbody></table>';  
 echo $output;  
 ?>  