<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/recepti.php";

$order = '';

$recepti=Recept::vratiSve($mysqli,$order);

 ?>


<html>
<head>
    <?php
        include('head.php');
    ?>
        <title>Recepti</title>
</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

                <div class="table-responsive" id="tabela-igrica">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th><a class="column_sort" id="naziv" data-order="desc" href="#">Naziv</a></th>
                                <th><a class="column_sort" id="ocena" data-order="desc" href="#">Ocena</a></th>
                                <th><a class="column_sort" id="opis" data-order="desc" href="#">Opis</a></th>

                                <th>Vrsta recepta</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($recepti as $recepti):	
                            ?>
                                <tr>
                                    <td><?php echo $recepti->naziv;?></td>
                                    <td><?php echo $recepti->ocena;?></td>
                                    <td><?php echo $recepti->opis;?></td>
                                    <td><?php echo $recepti->vrsta->NazivVrste;?></td>
                                    <td><a href="brisanjeRecepta.php?id=<?php echo $recepti->IDRecepta;?>">
                                            <img class="icon-images" src="img/kanta.png" width="20px" height="20px"/>
                                        </a>
                                        <a href="izmenaRecepta.php?id=<?php echo $recepti->IDRecepta;?>">
                                            <img class="icon-images" src="img/izmena.png" width="20px" height="20px" />
                                        </a>
                                    </td>

                                </tr>
                        
                            <?php endforeach; ?> 
                    
                        </tbody>
                    </table>
                </div>

            <div id="output" >

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>


</html>
<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"server/sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#tabela-recepata').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  

 </script> 