<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/recepti.php";


$vrsta=Vrsta::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$naziv=trim($_POST['naziv']);
    $ocena=trim($_POST['ocena']);
    $opis=trim($_POST['opis']);
    $vrsta=$_POST['vrsta'];
    
	
	
	$data = Array (
				"naziv" => $naziv, 
				"ocena" => $ocena,					
				"opis" => $opis,					
                "IDVrste" => $vrsta,    
        );	
        
	$recept=new Recept(null,$naziv,$ocena,$opis,$vrsta);
		
		$recept->UbaciRecept($data,$mysqli);
		
        $recept = $recept->getPoruka();
        header("Location:unosRecepta.php");
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos novog recepta</title>
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
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"><img id="recept-logo-img" src="img/logo1.jpg" alt="" width="700" height="500" ></div>
        <div id="recept" class="col-md-4"></div>
        <div class="col-md-4">
            <form name="unosIgrice" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="naziv">Naziv recepta:</label>
                    <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Unesite naziv recepta">
                </div>
                <div class="form-group">
                    <label for="ocena">Ocena recepta:</label>
                    <input type="text" class="form-control" name="ocena" id="ocena" placeholder="Unesite ocenu recepta">

                </div>

                <div class="form-group">
                    <label for="opis">Opis recepta:</label>
                    <input type="text" class="form-control" name="opis" id="opis" placeholder="Unesite opis recepta">

                </div>

                <div class="form-group">
                    <label for="vrsta">Vrsta recepta:</label>

                    <select class="form-control" name="vrsta" id="vrsta">
                        <?php foreach($vrsta as $v): ?>
                        <option value="<?php echo $v->IDVrste;?>">
                            <?php echo $v->NazivVrste;?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>