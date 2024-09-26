<?php
@include "config.php";
session_start();


if (isset($_SESSION['poruka'])) {
    echo $_SESSION['poruka'];
    unset($_SESSION['poruka']); // Očisti poruku nakon prikaza
}


// Proveri da li je korisnik prijavljen
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Učitaj ID rezervacije
if (isset($_POST['idRezervacije'])) {
    $idRezervacije = mysqli_real_escape_string($konekcija, $_POST['idRezervacije']);
    $userId = $_SESSION['user_id']; // ID korisnika iz sesije

    // Prvo postavi idRezervacije u tabeli korisnik na NULL
    $updateKorisnik = "UPDATE korisnik SET idRezervacije = NULL WHERE id = '$userId' AND idRezervacije = '$idRezervacije'";
    if ($konekcija->query($updateKorisnik) === TRUE) {
        // Zatim obriši rezervaciju iz tabele rezervacija
        $deleteRezervacija = "DELETE FROM rezervacija WHERE idRezervacije = '$idRezervacije'";
        if ($konekcija->query($deleteRezervacija) === TRUE) {
            // Uspešno obrisano
            $_SESSION['poruka'] = 'Uspešno ste otkazali rezervaciju vozila.';
            header("Location: index.php?success=1");
            exit();
        } else {
            // Greška prilikom brisanja rezervacije
            $_SESSION['poruka'] = 'Došlo je do greške prilikom otkazivanja rezervacije.';
            header("Location: index.php");
            exit();
        }
    } else {
        // Greška prilikom ažuriranja korisnika
        $_SESSION['poruka'] = 'Došlo je do greške prilikom ažuriranja korisnika.';
        header("Location: index.php");
        exit();
    }
}


// Redirekcija na stranicu sa rezervacijama
header('Location: uspesnaRezervacija.php');
exit();
?>
