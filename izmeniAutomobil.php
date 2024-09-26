<?php

@include "config.php";
session_start();

@$idAuta = $_POST["izmenaAuta"];
if(isset($_POST["izmeniAuto"]))
{
    if(empty($idAuta))
    {
        $error[]="Morate uneti id auta za izmenu!";
    }
    else
    {
        @$idAutaSQL = mysqli_real_escape_string($konekcija,$_POST["izmenaAuta"]);

        $upitProvere = "SELECT * FROM automobil WHERE idAuta='$idAutaSQL' ";
        $rezultatProvere = mysqli_query($konekcija,$upitProvere);
        if(mysqli_num_rows($rezultatProvere)>0)
        {
            $_SESSION["idAuta"] = $idAuta;
            header("location:izmeniAutomobilForma.php");   
        }
        else
        {
            $error[] = "Ne postoji auto sa Id: ".$idAuta."";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balkan Drive | IzmeniAuto</title>
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="icons/css/all.min.css">
    <link rel="stylesheet" href="css/izmeniAutomobil.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="ispisPodataka">
    <div class="forma">
        <form method="post">
            <div class="row mb-3">
                <h1 class="formaNaslov">Izmeni auto</h1>
                
                <label for="izmenaAuta" class="col-sm-2 col-form-label" id="labelInput">Id: </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="izmenaAuta">
                </div>
            </div>
            <?php
  
            if(isset($_SESSION['uspesnoIzmenjen']))
            {
                echo"<span class='uspesno'>".$_SESSION['uspesnoIzmenjen']."</span>";
                unset($_SESSION['uspesnoIzmenjen']);
            }
            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo"<span class='greskaPrazno'>".$error."</span>";
                }
                
            }

            ?>
            <input type="submit" value="Izmeni auto" id="formaSubmit" name="izmeniAuto">
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
<?php
    $prikaziAutomobile = "SELECT * FROM automobil";

    $rezultat = mysqli_query($konekcija,$prikaziAutomobile);
    if(mysqli_num_rows($rezultat)>0)
    {
        ?>
        <table>
            <tr>
                <th>Id auta</th>
                <th>Marka</th>
                <th>Tip vozila</th>
                <th>Gorivo</th>
                <th>Menjac</th>
                <th>Klima</th>
                <th>Gps</th>
                <th>Cena</th>
            </tr>
        
        <?php
        while($row = mysqli_fetch_assoc($rezultat))
        {
            ?>
            <tr>
                <td><?php echo $row["idAuta"]?></td>
                <td><?php echo $row["marka"]?>, <?php echo $row["marka"]?></td>
                <td><?php echo $row["tipVozila"]?>, <?php echo $row["tipVozila"]?></td>
                <td><?php echo $row["gorivo"]?>, <?php echo $row["gorivo"]?></td>
                <td><?php echo $row["menjac"]?>, <?php echo $row["menjac"]?></td>
                <td><?php echo $row["klima"]?>, <?php echo $row["klima"]?></td>
                <td><?php echo $row["gps"]?>, <?php echo $row["gps"]?></td>
                <td><?php echo $row["cena"]?> &euro;</td>
            </tr>
            <?php
        }
        ?></table><?php
    }
    else
    {
        ?>
        <div class="nemaPodataka">
            <span id='np'>Nema podataka u bazi!</span>
        </div>
        <?php
    }

    ?>



<script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>