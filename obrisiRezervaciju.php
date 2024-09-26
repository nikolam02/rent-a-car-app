<?php

@include "config.php";
session_start();

@$idRezervacije = $_POST["brisanjeRezervacije"];
if (isset($_POST["brisiRezervaciju"])) {
    if (empty($idRezervacije)) {
        $error[] = "Morate uneti id rezervacije za brisanje!";
    } else {
        $idRezervacijeSQL = mysqli_real_escape_string($konekcija, $_POST["brisanjeRezervacije"]);

        // Proveri da li rezervacija postoji
        $upitProvere = "SELECT * FROM rezervacija WHERE idRezervacije='$idRezervacijeSQL'";
        $rezultatProvere = mysqli_query($konekcija, $upitProvere);
        if (mysqli_num_rows($rezultatProvere) > 0) {
            // Prvo uzmi ID auta vezanog za rezervaciju
            $row = mysqli_fetch_assoc($rezultatProvere);
            $idAuta = mysqli_real_escape_string($konekcija, $row['idAuta']);

            // Ažuriraj korisnika da ne bude više vezan za ovu rezervaciju
            $updateKorisnik = "UPDATE korisnik SET idRezervacije=null, rezervisano=0 WHERE idRezervacije='$idRezervacijeSQL'";
            mysqli_query($konekcija, $updateKorisnik);

            // Sada obriši rezervaciju
            $brisanje = "DELETE FROM rezervacija WHERE idRezervacije='$idRezervacijeSQL'";
            if (mysqli_query($konekcija, $brisanje)) {
                $uspesno = "Uspešno brisanje rezervacije";
            } else {
                $error[] = "Greška prilikom brisanja rezervacije: " . mysqli_error($konekcija);
            }
        } else {
            $error[] = "Ne postoji rezervacija sa Id: " . $idRezervacije . "";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balkan Drive | BrisanjeRezervacije</title>
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
                <h1 class="formaNaslov">Brisanje rezervacije</h1>
                
                <label for="brisanjeRezervacije" class="col-sm-2 col-form-label" id="labelInput">Id rezervacije: </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="brisanjeRezervacije">
                </div>
            </div>
            <?php
            if (isset($uspesno)) {
                echo "<span class='uspesno'>".$uspesno."</span>";
            }
            if (isset($error)) {
                foreach ($error as $error) {
                    echo "<span class='greskaPrazno'>".$error."</span>";
                }
            }
            ?>
            <input type="submit" value="Obriši rezervaciju" id="formaSubmit" name="brisiRezervaciju">
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
$prikaziRezervacije = "SELECT * FROM rezervacija";

$rezultat = mysqli_query($konekcija, $prikaziRezervacije);
if (mysqli_num_rows($rezultat) > 0) {
    ?>
    <table>
        <tr>
            <th>Id rezervacije</th>
            <th>Id automobila</th>
            <th>Id korisnika</th>
            <th>Datum preuzimanja</th>
            <th>Datum vraćanja</th>
        </tr>

    <?php
    while ($row = mysqli_fetch_assoc($rezultat)) {
        ?>
        <tr>
            <td><?php echo $row["idRezervacije"] ?></td>
            <td><?php echo $row["idAuta"] ?></td>
            <td><?php echo $row["idKorisnika"] ?></td>
            <td><?php echo $row["datumPreuzimanja"] ?></td>
            <td><?php echo $row["datumVracanja"] ?></td>
        </tr>
        <?php
    }
    ?></table><?php
} else {
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
