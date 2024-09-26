<?php

@include "config.php";
session_start();

@$idAuta = $_POST["brisanjeAuta"];
if(isset($_POST["brisiAuto"]))
{
    if(empty($idAuta))
    {
        $error[]="Morate uneti id leta za brisanje!";
    }
    else
    {
        @$idAutaSQL = mysqli_real_escape_string($konekcija,$_POST["brisanjeAuta"]);
        
        $upitProvere = "SELECT * FROM automobil WHERE idAuta='$idAutaSQL' ";
        $rezultatProvere = mysqli_query($konekcija,$upitProvere);
        if(mysqli_num_rows($rezultatProvere)>0)
        {
            $selectRez = "SELECT * FROM automobil WHERE idAuta = '$idAutaSQL'";
            if($rez = mysqli_query($konekcija,$selectRez))
            {
                if(mysqli_num_rows($rez)>0)
                {
                    $row = mysqli_fetch_array($rez);
                    $idAuta = mysqli_real_escape_string($konekcija,$row['idAuta']);
                    
                    $select_r_idRez = "SELECT * FROM rezervacija WHERE idAuta = '$idAuta'";
                    $rez_r_idRez = mysqli_query($konekcija,$select_r_idRez);
                    if($rez_r_idRez)
                    {
                        if(mysqli_num_rows($rez_r_idRez)>0)
                        {
                            $row = mysqli_fetch_array($rez_r_idRez);
                            $idRezervacije = mysqli_real_escape_string($konekcija,$row['idRezervacije']);
                            
                            $updateKorisnik = "UPDATE korisnik SET idRezervacije=null, rezervisano=0 WHERE idRezervacije='$idRezervacije'";
                            mysqli_query($konekcija,$updateKorisnik);
                            
                            //brisanje rezervacije ako postoji
                            $brisanjeRezervacije = "DELETE FROM rezervacija WHERE idAuta = '$idAuta'";  
                            mysqli_query($konekcija,$brisanjeRezervacije);
                        }
                    }
                    
                    
                }
            }
            
            
            $brisanje = "DELETE FROM automobil WHERE idAuta='$idAutaSQL'";
            if(mysqli_query($konekcija,$brisanje))
            {
                $uspesno = "Uspešno brisanje";
            }
        }
        else
        {
            $error[] = "Ne postoji auto sa Id: ".$idLeta."";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Balkan Drive | BrisanjeAuta</title>
<link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
<link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="icons/css/all.css">
<link rel="stylesheet" href="icons/css/all.min.css">
<link rel="stylesheet" href="css/obrisiAuto.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="ispisPodataka">
<div class="forma">
<form method="post">
<div class="row mb-3">
<h1 class="formaNaslov">Brisanje auta</h1>

<label for="brisanjeAuta" class="col-sm-2 col-form-label" id="labelInput">Id: </label>
<div class="col-sm-10">
<input type="number" class="form-control" name="brisanjeAuta">
</div>
</div>
<?php
if(isset($uspesno))
{
    echo"<span class='uspesno'>".$uspesno."</span>";
}
if(isset($error))
{
    foreach($error as $error)
    {
        echo"<span class='greskaPrazno'>".$error."</span>";
    }
    
}

?>
<input type="submit" value="Obriši auto" id="formaSubmit" name="brisiAuto">
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