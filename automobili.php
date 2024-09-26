<?php

@include "config.php";

session_start();
$korisnik = isset($_SESSION['user_id']);

if(isset($_POST["odjaviSe"]))
{
    session_unset();
    session_destroy();
    header("location:loginPage.php");
}
if(isset($_POST["prijaviSe"]))
{
    header("location:loginPage.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automobili | Balkan Drive</title>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/automobili.css">
    <link rel="stylesheet" href="css/modalForma.css">
</head>
<body>
    <div class="hero-image" style="background-image: url('./heroImage/navPic.jpg');">
        <!-- pocetak navigacije -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <a class="navbar-brand fs-3" href="index.php">
                    <img src="logo/logo6.png" alt="Bootstrap" width="50" height="20" id="navbarLogo" class="img-fluid">
                </a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- SideBar -->
                <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <!-- SideBar Header -->
                    <div class="  offcanvas-header text-black border-bottom">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BalkanDrive</h5>
                        <button type="button" class="btn-close btn-close-black shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <!-- SideBar Body -->
                    <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
                        <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Početna</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link active" style="color: rgb(0, 0, 0);" aria-current="page" href="automobili.php">Automobili</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="usloviNajma.php">Uslovi najma</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="oNama.php">O nama</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="kontakt.php">Kontakt</a>
                            </li>
                            <?php 
                                if(isset($_SESSION['user_name'])){
                                  echo   "<li class='nav-item mx-2'>
                                    <a class='nav-link' href='mojaRezervacija.php'>Moje rezervacije</a>
                                </li>";
                                }
                            ?>
                        </ul>     
                    </div>
                </div>
            </div>
        </nav>
        <!-- kraj navigacije -->    
    </div>

    <!-- kratak opis -->
    <div class="iznajmljivanje container-fluid" style="background-image: url('./img/automobili.jpg');">
         <h1 class="naslov d-flex justify-content-center"><strong>  Iznajmljivanje automobila je jednostavno!</strong></h1>
        <div class="container-fluid kratkePogodnosti bg-transparent">
            <div class="section-content relative"> 
                <div class="row row-large align-center row-divided" id="row-a1"> 
                    <div class="col medium-4 small-12 large-4">
                        <div class="col-inner naAdresi"> 
                            <div class="col medium-4 small-12 large-4">
                                <div class="col-inner"> 
                                    <div class="text-center">  
                                        <p class="text-wrap"><i class="fa-solid fa-check"></i>   Rezervišite onlajn, telefonom ili lično</p> 
                                    </div>  
                                </div>
                            </div> 
                        </div>
                    </div> 
                    <div class="col medium-4 small-12 large-4">
                        <div class="col-inner jednostavnaRezervacija"> 
                            <div class="col medium-4 small-12 large-4">
                                <div class="col-inner"> 
                                    <div class="text-center"> 
                                        <p class="text-wrap"><i class="fa-solid fa-check"></i>   Pokupite vozilo ili zatražite preuzimanje</p> 
                                    </div>  
                                </div>
                            </div> 
                        </div>
                    </div> 
                    <div class="col medium-4 small-12 large-4">
                        <div class="col-inner dugorocniNajam"> 
                            <div class="text-center"> 
                                <p class="text-wrap"><i class="fa-solid fa-check"></i>   Uživajte u neograničenoj kilometraži</p> 
                            </div>  
                        </div>
                    </div> 
                    <div class="col medium-4 small-12 large-4">
                        <div class="col-inner dugorocniNajam"> 
                            <div class="text-center"> 
                                <p class="text-wrap"><i class="fa-solid fa-check"></i>   Ostavite automobil na određenoj lokaciji i platite</p> 
                            </div>  
                        </div>
                    </div>
                </div> 
            </div>
        </div>             
    </div>
    <!-- ponuda automobila -->
    <?php
// 1. Kreiranje konekcije sa bazom
$servername = "localhost";
$username = "root"; // Korisničko ime za bazu
$password = ""; // Lozinka za bazu
$dbname = "balkandrive"; // Naziv baze podataka

$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert alert-success">Uspešno ste rezervisali vozilo!</div>';
}

// Provera konekcije
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

// SQL upit za povlačenje podataka o automobilima
$sql = "SELECT * FROM automobil";
$result = $conn->query($sql);

//  Dinamičko generisanje kartica automobila
if ($result->num_rows > 0) {
    echo '<div class="container-fluid text-center ponuda">
            <div class="row">';
    
    // Petlja koja prolazi kroz svaki red iz baze
    while($row = $result->fetch_assoc()) {
        echo '<div class="kartica col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonudaBaner">
                            <img src="topPonuda/' . $row["slika"] . '" alt="Slika automobila" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">' . $row["marka"] . '</h5>
                            <p class="ikonice"><i class="fa-solid fa-key"></i> Tip vozila: ' . $row["tipVozila"] . '</p>
                            <p class="ikonice"><i class="fa-solid fa-gas-pump"></i> ' . $row["gorivo"] . '</p>
                            <p class="ikonice"><i class="fa-solid fa-gear"></i> Menjač: ' . $row["menjac"] . '</p>
                            <p class="ikonice"><i class="fa-solid fa-temperature-high"></i> A/C</p>
                            <p class="ikonice"><i class="fa-solid fa-location-dot"></i> GPS</p>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>' . $row["cena"] . '€</strong></h5>';
                            
                            if(isset($_SESSION['user_id'])) {
                                // Ako je korisnik prijavljen, prikaži dugme za rezervaciju sa jedinstvenim modal id-om
                                echo '<button class="rezervisiTop" data-bs-toggle="modal" data-bs-target="#rezervacijaModal'.$row["idAuta"].'">Rezerviši</button>';
                            } else {
                                // Ako nije prijavljen, prikaži poruku o potrebi za logovanjem
                                echo '<button class="rezervisiTop" onclick="alert(\'Morate biti prijavljeni da biste izvršili rezervaciju!\')">Rezerviši</button>';
                            }
    
        echo        '</div>
                    </div>
                </div>';
                
        // Modal za rezervaciju sa jedinstvenim id-om
        if(isset($_SESSION['user_id'])) {
            echo '<!-- Modal za rezervaciju -->
                <div class="modal fade" id="rezervacijaModal'.$row["idAuta"].'" tabindex="-1" aria-labelledby="rezervacijaModalLabel'.$row["idAuta"].'" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="rezervacijaModalLabel'.$row["idAuta"].'">Rezervacija vozila</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="rezervacijaForma'.$row["idAuta"].'" method="POST" action="rezervisi.php">
                            <input type="hidden" name="idAuta" value="'.$row["idAuta"].'">
                            <label for="datumPreuzimanja">Datum preuzimanja:</label>
                            <input type="date" name="datumPreuzimanja" class="form-control mb-2" required>
                            <label for="vremePreuzimanja">Vreme preuzimanja:</label>
                            <input type="time" name="vremePreuzimanja" class="form-control mb-2" required>
                            <label for="datumVracanja">Datum vraćanja:</label>
                            <input type="date" name="datumVracanja" class="form-control mb-2" required>
                            <label for="vremeVracanja">Vreme vraćanja:</label>
                            <input type="time" name="vremeVracanja" class="form-control mb-2" required>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-primary" form="rezervacijaForma'.$row["idAuta"].'">Potvrdi rezervaciju</button>
                      </div>
                    </div>
                  </div>
                </div>';
        }
        echo '</div>';
    }
    
    echo '</div></div>';
} else {
    echo "Nema dostupnih automobila.";
}

// Zatvori konekciju
$conn->close();
?>

    <footer>
        <div class="footer">
            <div class="container text-center">
                <div class="row">
                    <div class="col" id="footerLevo">
                        <h1 class="footerNaslov">Balkan Drive</h1>
                        <div class="footerLinkovi">
                                <form method="post">
                                        <?php
                                            if(isset($_SESSION['user_name']))
                                            {
                                                echo "<h1 class='fLink'><input id='odjaviSe' type='submit' class='fLink' style='border: none;' value='Odjavi se' name='odjaviSe'></input></h1>";
                                            }
                                            else
                                            {
                                                echo "<h1 class='fLink'><input type='submit' id='prijaviSe' class='fLink' value='Prijavi se' style='border: none;' name='prijaviSe'></input></h1>";
                                            }
                                        ?>
                                    <h1 class="fLink"><a href="automobili.php" class="fLink">Automobili</a></h1>
                                    <h1 class="fLink"><a href="usloviNajma.php" class="fLink">Uslovi najma</a></h1>
                                    <h1 class="fLink"><a href="oNama.php" class="fLink">O nama</a></h1>
                                    <h1 class="fLink"><a href="kontakt.php" class="fLink">Kontakt</a></h1>
                                </form>
                        </div>
                        <div class="oKompaniji">
                            <h5 class="naslovKompanija">O kompaniji:</h5>
                            <p class="opisKompanija">Balkan Drive Rent-a-Car Agencija je pouzdan partner u vašem putovanju. Naša misija je pružiti vrhunsku uslugu iznajmljivanja vozila uz povoljne tarife i jednostavan proces rezervacije. Balkan Drive je sinonim za udobnost, sigurnost i slobodu kretanja na putevima Balkana. Vaša avantura počinje s nama!</p>
                        </div>
                    </div>
                    <div class="col" id="footerDesno">
                        <div class="kontakt">
                            <p class="tekstKontakt" id="kontaktTelefon"><i class="fa-sharp fa-solid fa-phone"></i>  +381 653200210</p>
                            <p class="tekstKontakt" id="kontaktMail"><i class="fa-solid fa-envelope"></i>  nikolamatejic5@gmail.com</p>
                            <p class="tekstKontakt" id="kontaktLokacija"><i class="fa-solid fa-map-location-dot"></i>  Pariske Komune 17, 11010 Beograd, Srbija</p>
                            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.7809515145946!2d20.4095247!3d44.826026999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6577077f64d7%3A0x36dcddb7eb13828f!2sPariske%20komune%2017%2C%20Beograd!5e0!3m2!1shr!2srs!4v1706817148786!5m2!1shr!2srs" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="mreze">
                            <a href="https://www.instagram.com/_dzonii_02/"><i class="fa-brands fa-instagram" style="color:  #dabb4cbf;" id="ikonice"></i></a>
                            <a href=""><i class="fa-brands fa-facebook" style="color:  #dabb4cbf;" id="ikonice"></i></a>
                            <a href=""><i class="fa-brands fa-linkedin" style="color:  #dabb4cbf;"  id="ikonice"></i></a>
                            <a href=""><i class="fa-brands fa-youtube" style="color:  #dabb4cbf;" id="ikonice"></i></a>
                            <a href=""><i class="fa-brands fa-twitter" style="color:  #dabb4cbf;" id="ikonice"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="js/prikaziFormu.js"></script>
</body>
</html>