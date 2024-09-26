<?php
@include "config.php";
session_start();

@$idAuta = $_SESSION["idAuta"];
@$marka = $_POST["marka"];
@$tipVozila = $_POST["tipVozila"];
@$gorivo = $_POST["gorivo"];
@$menjac = $_POST["menjac"];
@$klima = $_POST["klima"];
@$gps = $_POST["gps"];
@$cena = $_POST["cena"];


$select = "SELECT * FROM automobil WHERE idAuta='$idAuta'";
if($rezultat = mysqli_query($konekcija,$select))
{
    while($row = mysqli_fetch_assoc($rezultat))
    {
        $idAutaSQL = $row["idAuta"];
        $markaSQL = $row["marka"];
        $tipVozilaSQL = $row["tipVozila"];
        $gorivoSQL = $row["gorivo"];
        $menjacSQL = $row["menjac"];
        $klimaSQL = $row["klima"];
        $gpsSQL = $row["gps"];
        $cenaSQL = $row["cena"];
    }
}


if(isset($_POST["izmeniAuto1"]))
{
    if(empty($marka) || empty($tipVozila) || empty($gorivo) || empty($menjac) || 
    empty($klima) || empty($gps) || empty($cena))
    {
        $error[] = "Morate popuniti sva obavezna polja";
    }
    else
    {
        $idAuta = mysqli_real_escape_string($konekcija,$_SESSION["idAuta"]);
        $markaSQL = mysqli_real_escape_string($konekcija,$_POST["marka"]);
        $tipVozilaSQL = mysqli_real_escape_string($konekcija,$_POST["tipVozila"]);
        $gorivoSQL = mysqli_real_escape_string($konekcija,$_POST["gorivo"]);
        $menjacSQL = mysqli_real_escape_string($konekcija,$_POST["menjac"]);
        $klimaSQL = mysqli_real_escape_string($konekcija,$_POST["klima"]);
        $gpsSQL = mysqli_real_escape_string($konekcija,$_POST["gps"]);
        $cenaSQL = mysqli_real_escape_string($konekcija,$_POST["cena"]);


        $insert = "UPDATE automobil SET  marka='$marka', tipVozila='$tipVozila', 
        gorivo='$gorivo', menjac='$menjac', klima='$klima',gps='$gps', 
        cena='$cena' WHERE idAuta='$idAuta' ";
        if(mysqli_query($konekcija,$insert))
        {
            $_SESSION['uspesnoIzmenjen'] = "Uspešno ste izmenili let iz baze!";
            header("location:izmeniAutomobil.php");
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | IzmeniAutomobil</title>
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="icons/css/all.min.css">
    <link rel="stylesheet" href="css/izmeniAutomobilForma.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="ispisPodataka">
    <div class="forma">
        <form method="post">
            <div class="row mb-3">
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Id:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="marka" value="<?php echo $_SESSION["idAuta"]?>" disabled>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <h1 class="formaNaslov">Marka</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Marka:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="marka" value="<?php echo $marka?>">
                </div>
            </div>
            
            <hr>
            
            <div class="row mb-3">
                <h1 class="formaNaslov">Tip vozila</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Tip vozila:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tipVozila" value="<?php echo $tipVozila?>">
                </div>
            </div>
            
            <hr>

            <div class="row mb-3">
                <h1 class="formaNaslov">Gorivo</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Gorivo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gorivo" value="<?php echo $gorivo?>">
                </div>
            </div>
            
            <hr>
            
            <div class="row mb-3">
                <h1 class="formaNaslov">Menjac</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Menjac:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="menjac" value="<?php echo $menjac?>">
                </div>
            </div>
            <hr>

            <div class="row mb-3">
                <h1 class="formaNaslov">Klima</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Klima:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="klima" value="<?php echo $klima?>">
                </div>
            </div>
            <hr>

            <div class="row mb-3">
                <h1 class="formaNaslov">GPS</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">GPS:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gps" value="<?php echo $gps?>">
                </div>
            </div>
            <hr>

            
            <div class="row mb-3">
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Cena:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="cena" value="<?php echo $CenaSQL?>">
                </div>
            </div>
            <p><i>Cena treba biti izražena u evrima...</i></p>
            
            <hr>
            <!-- ovde ide poruka za prazan unos -->
            <?php

            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo"<span class='greskaPrazno'>".$error."</span>";
                }
                
            }

            ?>
            <input type="submit" value="Izmeni auto" id="formaSubmit" name="izmeniAuto1">
            <a href="izmeniAutomobil.php" id="linkPocetna">Izaberite drugi auto</a>
        </form>
    </div>
</div>




    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>