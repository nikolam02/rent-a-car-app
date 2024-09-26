<?php

@include "config.php";

session_start();

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


if (isset($_SESSION['poruka'])) {
    echo '<script>alert("' . $_SESSION['poruka'] . '");</script>';
    unset($_SESSION['poruka']); // Očisti poruku nakon što je prikazana
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balkan Drive</title>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body>
    <!-- pocetak hero sekcije -->
    <div class="hero-image" style="background-image: url('./heroImage/hero.jpg');">
        <!-- pocetak navigacije -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <a class="navbar-brand fs-3" href="index.php">
                    <img src="logo/logo6.png" alt="Bootstrap" width="150" height="80" id="navbarLogo" class="img-fluid">
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
                                <a class="nav-link active" style="color: rgb(0, 0, 0);" aria-current="page" href="index.php">Početna</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="automobili.php">Automobili</a>
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
                        <!-- Registracija / Login -->
                        <div class="button d-flex justify-content-center flex-column flex-lg-row align-items-center gap-3">
                            <?php
                                if(isset($_SESSION['user_name']))
                                {
                                    echo "<a class='nav-link' href='#'><h5 class='NavTextIme'>Zdravo ".$_SESSION['user_name']."!</h5></a>";
                                }
                                else
                                {
                                    echo "<a href='loginPage.php' class='signUp' id='linkPrijaviSe' ><input type='submit' value='Prijavi se' class='signUp'></a>";
                                    echo "<a href='register.php' class='registration ' id='linkRegistujSe'><input type='submit' value='Registruj se' class='registration'></a>";
                                }
                            ?>
                        </div>    
                    </div>
                </div>
            </div>
        </nav>
        <!-- kraj navigacije -->
        <h1 class="balkanDrive d-flex justify-content-center">Balkan Drive-Brzo, Sigurno, Udobno baš kako ti želiš</h1>
        <!-- <h4 class="rezervacija d-flex justify-content-center">Rezervišite Vaše vozilo sada</h4> -->
        <!-- forma rezervacije -->
        <div class="button d-flex justify-content-center flex-column flex-lg-row align-items-center gap-3">
        <a href='automobili.php' class='rezervacijaForm' id='rezervisi' ><input type='submit' value='Rezerviši' class='reservation'></a>
        </div>
        
    </div>
    <!-- kraj hero sekcije -->
    <!-- pocetak top ponude -->
    <div class="container-fluid text-center ponuda">
        <h1 class="topPonudaNaslov">Izdvajamo iz ponude</h1>
        <p class="linijaNaslov">_________________________________________________________________________</p> </p>
        <div class="row">
            <div class="kartica col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonudaBaner">
                            <img src="topPonuda/bmw3.jpg" alt="topPonudaBaner1" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">BME Serije 3</h5>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>35€</strong></h5>
                            <button class="rezervisiTop" onclick="window.location.href='automobili.php'">DETALJNIJE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" kartica col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonuda">
                            <img src="topPonuda/mercedes.jpg" alt="topPonudaBaner1" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">Mecedes-Benz C</h5>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>50€</strong></h5>
                            <button class="rezervisiTop" onclick="window.location.href='automobili.php'">DETALJNIJE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kartica col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonudaBaner">
                            <img src="topPonuda/peugeot.jpg" alt="topPonudaBaner1" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">Peugeot 508</h5>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>30€</strong></h5>
                            <button class="rezervisiTop" onclick="window.location.href='automobili.php'">DETALJNIJE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonudaBaner">
                            <img src="topPonuda/rangeRover.jpg" alt="topPonudaBaner1" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">Range Rover Evoque</h5>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>45€</strong></h5>
                            <button class="rezervisiTop" onclick="window.location.href='automobili.php'">DETALJNIJE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonudaBaner">
                            <img src="topPonuda/tiguan.jpg" alt="topPonudaBaner1" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">VW Tiguan</h5>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>37€</strong></h5>
                            <button class="rezervisiTop" onclick="window.location.href='automobili.php'">DETALJNIJE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="jumbotronTopPonuda" id="topPonuda">
                    <div class="topPonuda">
                        <div class="topPonudaBaner">
                            <img src="topPonuda/fordFocus.jpg" alt="topPonudaBaner1" class="topPonudaBaner">
                        </div>
                        <div class="topPonudaOpis">
                            <h5 class="markaAutomobila">Ford Focus</h5>
                            <h5 class="opisCena"><strong>Cena po danu</strong></h5>
                            <h5 class="cenaTop"><strong>30€</strong></h5>
                            <button class="rezervisiTop" onclick="window.location.href='automobili.php'">DETALJNIJE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- kraj topPonude -->
    <!-- pocetak kratkihPogodnosti -->
    <div class="container-fluid kratkePogodnosti">
        <div class="section-content relative"> 
            <div class="row row-large align-center row-divided" id="row-a1"> 
                <div class="col medium-4 small-12 large-4">
                    <div class="col-inner naAdresi"> 
                        <div class="col medium-4 small-12 large-4">
                            <div class="col-inner"> 
                                <div class="text-center"> 
                                    <h5 class="uppercase"><strong>Vozilo na Vašoj adresi</strong></h5> 
                                    <p class="text-wrap">Balkan Drive Rent-a-Car pruža privilegiju da vozilo dostavimo direktno na Vašu adresu, pružajući Vam maksimalnu udobnost i praktičnost. Bez obzira na to da li želite da započnete putovanje iz kuće ili kancelarije, naša usluga isporuke vozila čini proces iznajmljivanja jednostavnim i prilagođenim Vašim potrebama.</p> 
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
                                    <h5 class="uppercase"><strong>Jednostavna rezervacija</strong></h5> 
                                    <p class="text-wrap">Proces rezervacije vozila nikada nije bio lakši. Sa samo nekoliko koraka, možete brzo i jednostavno rezervisati vozilo iz udobnosti svog doma. Bez ikakvih muka i stresa, Vaše putovanje počinje sa sigurnošću i jednostavnošću koju pruža Balkan Drive. Osvežite svoje iskustvo putovanja s nama!</p> 
                                </div>  
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="col medium-4 small-12 large-4">
                    <div class="col-inner dugorocniNajam"> 
                        <div class="text-center"> 
                            <h5 class="uppercase"><strong>Dugoročni najam</strong></h5> 
                            <p class="text-wrap">Dugoročni najam vozila ne samo da vam pruža neograničenu slobodu kretanja, već dolazi i s nizom dodatnih pogodnosti. Naša fleksibilna i povoljna ponuda za dugoročno iznajmljivanje obezbeđuje ne samo udobnost, već i dodatne beneficije koje čine vaše putovanje još prijatnijim.</p> 
                        </div>  
                    </div>
                </div> 
            </div> 
        </div>
    </div>
    <!-- kraj kratkihPogodnosti -->

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
<script src="js/index.js"></script>
</body>
</html>