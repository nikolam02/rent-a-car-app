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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
                                        echo "<h1 class='fLink'><a href='loginPage.php' class='fLink'>Odjavi se</a></h1>";
                                    }
                                    else
                                    {
                                        echo "<h1 class='fLink'><a href='loginPage.php' class='fLink'>Prijavi se</a></h1>";
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
</body>
</html>