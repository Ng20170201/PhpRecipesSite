<!DOCTYPE html>
<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/recepti.php";

$id=$_GET['id'];

$recepti=Recept::vratiSve($mysqli," where r.IDRecepta=".$id);
$vrsta=Vrsta::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naziv = $_POST['naziv'];
    $ocena = $_POST['ocena'];
    $opis = $_POST['opis'];
    $vrsta = $_POST['vrsta'];       

    $mysqli->query("UPDATE receptii SET naziv='$naziv', ocena='$ocena', opis='$opis',IDVrste='$vrsta' WHERE IDRecepta=$id");
    header('location: unosRecepta.php');
}
 ?>

<html>

<head>
    <?php
        include('head.php');
    ?>

    <title>Izmena recepta</title>

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
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naziv">Naziv recepta:</label>
                    <input type="text" class="form-control" name="naziv" id="naziv"
                        value="<?php echo $recepti[0]->naziv; ?>">
                </div>
            
                <div class="form-group">
                    <label for="ocena">Ocena:</label>
                    <input type="text" class="form-control" name="ocena" id="ocena"
                        value="<?php echo $recepti[0]->ocena; ?>">
                </div>
                <div class="form-group">
                    <label for="opis">Opis</label>
                    <input type="text" class="form-control" name="opis" id="opis"
                        value="<?php echo $recepti[0]->opis; ?>">
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
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>