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
    <title>Balkan Drive | Uslovi Najma</title>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/usloviNajma.css?v=<?php echo time(); ?>">
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
                                <a class="nav-link active" style="color: rgb(0, 0, 0);" aria-current="page" href="usloviNajma.php">Uslovi najma</a>
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

    <div class="container-fluid kontent" style="background-image: url('img/logo.jpg');">
        <h1 class="naslov d-flex justify-content-center"><strong>Uslovi najma</strong></h1>
    </div>
    
    <!-- uslovi najma -->
    <div class="container-fluid text-center uslovi">
        <div class="row usloviNajma1">
          <div class="col-12">
            <div class="text-center">
              <h2>Korišćenje vozila</h2>
              <hr class="my-4">
              <p>
                Za vreme korišćenja vozila klijent (Najmoprimac) je dužan da se prema iznajmljenom vozilu odnosi s pažnjom, da vozilo uredno održava kako je predviđeno od strane ovlašćenog servisera i da u slučaju bilo kakvih problema o tome odmah obavesti predstavnike “Balkan Drive” Beograd, Pariske Komune 17, MB: 21572128, PIB: 111925291 (Najmodavac).
              </p>
            </div>
          </div>
        </div>
        
        <div class="row usloviNajma">
          <div class="col-12">
            <div class="text-center">
              <h2 class="mt-4">Neograničena kilometraža</h2>
              <hr class="my-4">
              <p>
                U cenu najma uračunata je neograničena kilometraža, isključivo uz prethodno odobrenje kompanije MS rent a car doo.
              </p>
            </div>
          </div>
        </div>

        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Depozit i plaćanje</h2>
                    <hr class="my-4">
                    <p>
                    Depozit je obavezan za određenu kategoriju vozila, isključivo u dogovoru sa kompanijom Balkan Drive rent a car doo. Depozit, kao i plaćanje najma, može se izvršiti u gotovini, uplatom na račun (pravna lica) ili plaćanjem karticama na POS terminalu. Sva plaćanja se vrše u dinarima po srednjem kursu eura Narodne Banke Srbije. Porez (PDV) za uslugu iznajmljivanja vozila je uključen u cenu najma, osim za pravna lica.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Preuzimanje i vraćanje vozila</h2>
                    <hr class="my-4">
                    <p>
                    Vozilo se može pruzeti i vratiti u našoj poslovnici, a moguća je i dostava odnosno vraćanje vozila izvan poslovnice, na kućnoj adresi, odnosno na odabranoj lokaciji. Ova usluga se ne doplaćuje na teritoriji Beograda, u zavisnosti od udaljenosti željenog dostavnog mesta. Vozilo se može preuzeti i vratiti i izvan standardnog vremena, bez doplate. Jednosmerni najam u Srbiji je moguć uz dogovor i dodatno se naplaćuje. Jednosmerni međunarodni najam je moguć uz doplatu u zavisnosti od udaljenosti. Prilikom preuzimanja i vraćanja vozila, obavezno je potpisivanje obrasca o stanju vozila, pri čemu savetujemo da zajedno sa našim predstavnikom dobro pregledate vozilo. Vozilo mora biti vraćeno u urednom vizuelnom stanju spolja i unutra, u suprotnom će biti naplaćen trošak pranja vozila prema standardnom cenovniku.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Uslovi koje Vozač mora da ispunjava</h2>
                    <hr class="my-4">
                    <p>
                    Minimum 23 godine starosti uz minimum 2 godine posedovanja vozačke dozvole (vozačka dozvola je obavezna na uvid). Obavezna identifikacija – lična karta ili pasoš na uvid predstavniku agencije. Navedeni uslovi se odnose i na drugog vozača. U cenu iznajmljivanja vozila uključeno je osiguranje od odgovornosti za štetu prema trećim licima do iznosa utvrđenog polisom obaveznog osiguranja. Uz probnu dozvolu nije moguće iznajmiti vozilo.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Osiguranje za štetu na iznajmljenom vozilu</h2>
                    <hr class="my-4">
                    <p>
                    Otkup odgovornosti za štetu na iznajmljenom vozilu uključen je u publikovanoj ceni najma iskazanoj na sajtu odnosno u ugovoru. Osiguranje važi isključivo uz obavezan zapisnik policije. Osiguravajuće društvo isplaćuje štetu u skladu sa uslovima kasko osiguranja – osiguranje neće isplatiti štetu u slučaju da je vozač upravljao iznajmljenim vozilom pod dejstvom alkohola (preko 0,2 promila) ili narkotika, ukoliko štetu izazove prolaskom na crveno svetlo, ukoliko se šteta načini pod uslovima nasilničke vožnje kao i uz grubo svesno ili nesvesno kršenje saobraćajnih propisa. Nijedno osiguranje ne pokriva štete nastale u unutrašnjosti vozila, oštećenje guma i točkova, slomljen i /ili izgubljen ključ, štete nastale točenjem pogrešne vrste goriva i štete nanete svesno, nepažnjom ili nebrigom Najmoprimca. Sva nabrojana oštećenja biće naplaćena u punom iznosu u momentu kada se vozilo vrati od Najmoprimca.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Osiguranje od krađe iznajmljenog vozila</h2>
                    <hr class="my-4">
                    <p>
                    Otkup odgovornosti za slučaj krađe iznajmljenog vozila uključen je u publikovanoj ceni najma. Osiguranje važi samo uz obaveznu prijavu krađe policiji i pod uslovom da je Najmoprimac zadržao kod sebe dokumenta i ključ od vozila koje je dužan da preda Najmodavcu. Kasko osiguranje ne važi u slučaju da je prilikom krađe vozilo bilo otključano ili je ključ bio ostavljen u bravi volana. Takođe, klijent je dužan da u slučaju da se desi krađa dokumenta i ključeve vozila dostavi Najmodavcu.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Policijski zapisnik je obavezan za sve vrste osiguranja!</h2>
                    <hr class="my-4">
                    <p>
                    Bez policijskog zapisnika, pun iznos štete i/ili krađe biće naplaćen od klijenta, bez obzira na vrstu kupljenog osiguranja (pošto se ovakve štete ne mogu naplatiti od kasko osiguranja). Zapisnik je potrebno sačiniti čak i u slučajevima kada klijent nije bio prisutan prilikom oštećenja vozila (npr. vozilo je oštećeno na parkingu od strane NN osobe). Za svako oštećenje vozilo potrebno je odmah obavestiti predstavnika MS rent a car Beograd koji će dati dalja uputstva i smernice. Agencija MS rent a car primenjuje zvanične uslove kasko osiguranja kompanije sa kojom je sklopljen ugovor o osiguranju.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Postupak u slučaju nezgode, štete i krađe vozila</h2>
                    <hr class="my-4">
                    <p>
                    Klijent je obavezan da postupi na sledeći način: da obavesti policiju i predstavnika MS rent a car-a o događaju i da postupi po njihovim instrukcijama; da zapiše podatke o drugim učesnicima u nezgodi, odnosno događaju; da ispuni izveštaj o nezgodi ili šteti prilikom vraćanja vozila predstavniku agencije; da napiše kratku izjavu u kojoj će opisati uzroke i okolnosti u kojima se desila nezgoda odnosno šteta; da pribavi zapisnik policije o nastaloj nezgodi ili šteti.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row usloviNajma">
            <div class="col-12">
                <div class="text-center">
                    <h2 class="mt-4">Ostale odredbe</h2>
                    <hr class="my-4">
                    <p>
                    Prelazak granice je dopušten isključivo uz dozvolu Najmodavca – svako vozilo poseduje zeleni karton. Gorivo nije uključeno u cenu – utrošeno gorivo plaća Najmoprimac. Sve prekršaje u saobraćaju koje načini Najmoprimac u toku najma vozila padaju na teret istog.
                    </p>
                </div>
            </div>
        </div>    
    </div>

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