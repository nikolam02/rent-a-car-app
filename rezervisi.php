<?php
session_start();
include('config.php'); // Konekcija na bazu

if (isset($_POST['idAuta']) && isset($_POST['datumPreuzimanja']) && isset($_POST['vremePreuzimanja']) && isset($_POST['datumVracanja']) && isset($_POST['vremeVracanja'])) {

    // Dobavljanje podataka iz POST metode
    $idAuta = mysqli_real_escape_string($konekcija, $_POST['idAuta']);
    $userId = $_SESSION['user_id']; // ID prijavljenog korisnika iz sesije
    $datumPreuzimanja = mysqli_real_escape_string($konekcija, $_POST['datumPreuzimanja']);
    $vremePreuzimanja = mysqli_real_escape_string($konekcija, $_POST['vremePreuzimanja']);
    $datumVracanja = mysqli_real_escape_string($konekcija, $_POST['datumVracanja']);
    $vremeVracanja = mysqli_real_escape_string($konekcija, $_POST['vremeVracanja']);

    // Uzmi cenu po danu iz tabele automobil
    $selectAuto = "SELECT cena FROM automobil WHERE idAuta='$idAuta'";
    $rezAuto = mysqli_query($konekcija, $selectAuto);

    if ($autoRow = mysqli_fetch_assoc($rezAuto)) {
        $cenaPoDanu = $autoRow['cena'];

        // Izračunaj ukupan broj dana
        $datumPreuzimanjaTimestamp = strtotime($datumPreuzimanja);
        $datumVracanjaTimestamp = strtotime($datumVracanja);
        $brojDana = ceil(($datumVracanjaTimestamp - $datumPreuzimanjaTimestamp) / (60 * 60 * 24)); // Prebaci u dane

        // Izračunaj ukupnu cenu
        $ukupnaCena = $brojDana * $cenaPoDanu;

        // SQL upit za unos podataka o rezervaciji u bazu
        $sql = "INSERT INTO rezervacija (idAuta, idKorisnika, datumPreuzimanja, vremePreuzimanja, datumVracanja, vremeVracanja, cena) 
                VALUES ('$idAuta', '$userId', '$datumPreuzimanja', '$vremePreuzimanja', '$datumVracanja', '$vremeVracanja', '$ukupnaCena')";

        if ($konekcija->query($sql) === TRUE) {
            // Ovo uzima poslednji ID iz tabele rezervacija
            $idRezervacije = $konekcija->insert_id; 

            // Ažuriraj tabelu korisnik sa ID-em rezervacije
            $sqlUpdateKorisnik = "UPDATE korisnik SET idRezervacije = '$idRezervacije' WHERE id = '$userId'";

            if ($konekcija->query($sqlUpdateKorisnik) === TRUE) {
                // Ako je sve uspešno, preusmeri korisnika
                $_SESSION['poruka'] = 'Uspešno ste rezervisali vozilo.';
                header("Location: index.php?success=1");
                exit();
            } else {
                // Prikaz SQL greške
                echo "Greška prilikom ažuriranja korisnika: " . mysqli_error($konekcija) . "<br>";
            }

        } else {
            // Ako dođe do greške, prikaži poruku o grešci
            $_SESSION['poruka'] = 'Došlo je do greške prilikom rezervacije.';
            header("Location: index.php");
            exit();
        }

    } else {
        echo "Greška: Auto nije pronađen.";
    }

    $konekcija->close(); // Zatvaranje konekcije
} else {
    // Ako podaci nisu ispravno poslati, prikaži grešku
    echo "Nisu uneti svi potrebni podaci.";
}
?>
