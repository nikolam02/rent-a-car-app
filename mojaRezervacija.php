<?php
@include "config.php";
session_start();

// Učitaj podatke o korisniku
$idKorisnika = mysqli_real_escape_string($konekcija, $_SESSION['user_id']);

// Učitaj podatke o korisniku iz baze
$selectUser = "SELECT * FROM korisnik WHERE id = '$idKorisnika'";
$resultUser = mysqli_query($konekcija, $selectUser);
$userData = mysqli_fetch_assoc($resultUser);

// Učitaj sve rezervacije za korisnika
$selectRezervacije = "SELECT * FROM rezervacija WHERE idKorisnika = '$idKorisnika'";
$resultRezervacije = mysqli_query($konekcija, $selectRezervacije);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balkan Drive | Moje rezervacije</title>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <link rel="stylesheet" href="css/uspesnaRezervacija.css?v=<?php echo time(); ?>">
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
                                <a class="nav-link" href="automobili.php">Automobili</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link " href="usloviNajma.php">Uslovi najma</a>
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
                                    <a class='nav-link active' style='color: rgb(0, 0, 0);' aria-current='page' href='uspesnaRezervacija.php'>Moje rezervacije</a>
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

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <div class="mb-4">
                            <h2 class="mb-1 text-muted">BalkanDrive.com</h2>
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Pariske Komune 17, 11010 Beograd, Srbija</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> nikolamatejic5@gmail.com</p>
                            <p><i class="uil uil-phone me-1"></i> +381 653200210</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Moji Podaci</h4>
                    <hr>
                    <h5>Informacije o korisniku:</h5>
                    <p><strong>Ime:</strong> <?php echo $userData['ime']; ?></p>
                    <p><strong>Prezime:</strong> <?php echo $userData['prezime']; ?></p>
                    <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
                    
                    <hr>
                    <h5>Moje rezervacije:</h5>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th>Id rezervacije</th>
                                    <th>Id auta</th>
                                    <th>Datum preuzimanja</th>
                                    <th>Vreme preuzimanja</th>
                                    <th>Datum vraćanja</th>
                                    <th>Vreme vraćanja</th>
                                    <th>Cena</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (mysqli_num_rows($resultRezervacije) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultRezervacije)) {
                                            echo "<tr>
                                                    <td>{$row['idRezervacije']}</td>
                                                    <td>{$row['idAuta']}</td>
                                                    <td>" . date('d.m.Y', strtotime($row['datumPreuzimanja'])) . "</td>
                                                    <td>{$row['vremePreuzimanja']}</td>
                                                    <td>" . date('d.m.Y', strtotime($row['datumVracanja'])) . "</td>
                                                    <td>{$row['vremeVracanja']}</td>
                                                    <td>{$row['cena']}&euro;</td>
                                                    <td>
                                                        <form method='post' action='otkazivanjeRezervacijeKorisnik.php'>
                                                            <input type='hidden' name='idRezervacije' value='{$row['idRezervacije']}'>
                                                            <button type='submit' class='btn btn-danger'>Otkazi rezervaciju</button>
                                                        </form>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>Nemate aktivnih rezervacija.</td></tr>";
                                    }
                                ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="d-print-none mt-4">
                        <div class="float-end">
                            <a href="index.php" id="button" class="btn btn-primary w-md">Povratak na početnu stranicu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
</div>

<!-- pocetak Footer-a -->
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
</body>
</html>
