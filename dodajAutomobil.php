<?php
@include "config.php";
session_start();

@$marka = $_POST["marka"];
@$tipVozila = $_POST["tipVozila"];
@$gorivo = $_POST["gorivo"];
@$menjac = $_POST["menjac"];
@$klima = $_POST["klima"];
@$gps = $_POST["gps"];
@$cena = $_POST["cena"];
@$slika = $_POST["slika"];

if (isset($_POST["dodajAutomobil1"])) {
    $markaSQL = mysqli_real_escape_string($konekcija, $_POST["marka"]);
    $tipVozilaSQL = mysqli_real_escape_string($konekcija, $_POST["tipVozila"]);
    $gorivoSQL = mysqli_real_escape_string($konekcija, $_POST["gorivo"]);
    $menjacSQL = mysqli_real_escape_string($konekcija, $_POST["menjac"]);
    $klimaSQL = mysqli_real_escape_string($konekcija, $_POST["klima"]);
    $gpsSQL = mysqli_real_escape_string($konekcija, $_POST["gps"]);
    $cenaSQL = mysqli_real_escape_string($konekcija, $_POST["cena"]);
    
    // Provera da li je slika uploadovana
    if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] == 0) {
        $slikaIme = basename($_FILES["slika"]["name"]);
        $target_dir = "topPonuda/";
        $target_file = $target_dir . $slikaIme;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Dozvoljeni formati fajlova
        $dozvoljeniFormati = array("jpg", "jpeg", "png");

        // Provera da li fajl ima odgovarajući format
        if (in_array($imageFileType, $dozvoljeniFormati)) {
            // Provera da li je fajl uspešno uploadovan u folder
            if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                // Fajl je uspešno uploadovan, sada unosimo podatke u bazu
                $slikaSQL = mysqli_real_escape_string($konekcija, $slikaIme);

                // Provera da li automobil već postoji u bazi
                $upitProvere = "SELECT * FROM automobil WHERE marka='$marka'";
                $rezultatProvere = mysqli_query($konekcija, $upitProvere);

                if (mysqli_num_rows($rezultatProvere) > 0) {
                    $error[] = "Već postoji automobil marke " . $marka . "";
                } else {
                    // Unos podataka u bazu
                    $insert = "INSERT INTO automobil (marka, tipVozila, gorivo, menjac, klima, gps, cena, slika)
                               VALUES ('$markaSQL', '$tipVozilaSQL', '$gorivoSQL', '$menjacSQL', '$klimaSQL', '$gpsSQL', '$cenaSQL', '$slikaSQL')";

                    if (mysqli_query($konekcija, $insert)) {
                        $_SESSION['uspesnoUbacen'] = "Uspešno ste ubacili automobil u bazu!";
                        header("location: admin.php");
                    } else {
                        $error[] = "Greška prilikom unosa u bazu.";
                    }
                }
            } else {
                $error[] = "Došlo je do greške prilikom upload-a slike.";
            }
        } else {
            $error[] = "Dozvoljeni formati su: JPG, JPEG, PNG.";
        }
    } else {
        $error[] = "Molimo vas da odaberete sliku.";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | DodajAuto</title>
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="icons/css/all.min.css">
    <link rel="stylesheet" href="css/dodajAutomobil.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="ispisPodataka">
    <div class="forma">
        <form method="post" enctype="multipart/form-data">

            <hr>
            <div class="row mb-3">
                <h1 class="formaNaslov">Slika automobila:</h1>
                
                <label for="slika" class="col-sm-2 col-form-label" id="labelInput">Slika:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="slika" required>
                </div>
            </div>
        
            
            <hr>
            <div class="row mb-3">
                <h1 class="formaNaslov">Marka automobila</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Marka:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="marka">
                </div>
            </div>
            
            <hr>
            
            <div class="row mb-3">
                <h1 class="formaNaslov">Tip vozila</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Tip vozila:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tipVozila">
                </div>
            </div>
            
            <hr>

            <div class="row mb-3">
                <h1 class="formaNaslov">Gorivo</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Gorivo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gorivo">
                </div>
            </div>
            
            <hr>


            
            <div class="row mb-3">
                <h1 class="formaNaslov">Menjac</h1>
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Menjac:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="menjac">
                </div>
            </div>

            <hr>
            
            <div class="row mb-3">
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Klima:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="klima">
                </div>
            </div>

            
            <hr>
            
            <div class="row mb-3">
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">GPS:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="gps">
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                
                <label for="marka" class="col-sm-2 col-form-label" id="labelInput">Cena:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="cena">
                </div>
            </div>
            <p><i>Cena treba biti izražena u evrima</i></p>
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
            <input type="submit" value="Dodaj auto" id="formaSubmit" name="dodajAutomobil1">

            <?php
                // Proveri da li je admin
                if (isset($_SESSION['admin_name'])) {
                    echo '<a href="admin.php" id="linkPocetna">Povratak na početnu</a>';
                }
                else{
                    echo '<a href="menadzer.php" id="linkPocetna">Povratak na početnu</a>';
                } 
            ?>

        </form>
    </div>
</div>




    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>