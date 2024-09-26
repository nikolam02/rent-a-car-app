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
    <title> O Nama | Balkan Drive</title>
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
    <link rel="stylesheet" href="css/oNama.css?v=<?php echo time(); ?>">
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
                                <a class="nav-link active" style="color: rgb(0, 0, 0);" aria-current="page" href="oNama.php">O nama</a>
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
    
    <div class="container-fluid kontent" style="background-image: url('img/kljucevi.jpg');">
        <h1 class="naslov d-flex justify-content-center"><strong>Mi nismo kao druge rent a car kompanije</strong></h1>
    </div>
    
    <div class="container-fluid text-center oNama">
        <div class="row oNama1">
            <div class="col-12">
                <div class="text-center">
                    <hr class="my-4">
                    <p>
                        Balkan Drive je inovativna kompanija koja je svojim pionirskim pristupom u domenu transporta revolucionirala način kako ljudi putuju i koriste usluge prevoza na Balkanu. Sa sjedištem u srcu Balkana, ova kompanija je postala sinonim za efikasan, siguran i udoban transport širom regiona.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row oNama1">
            <div class="col-12">
                <div class="text-center">
                    <hr class="my-4">
                    <p>
                        Jedna od ključnih karakteristika Balkan Drive-a je fokus na korisniku. Njihova misija je osigurati da svaki putnik doživi izvanredno iskustvo putovanja, bez obzira na destinaciju. Kroz pažljivo odabrani tim vozača, modernu flotu vozila opremljenih najnovijom tehnologijom, kao i intuitivnu online platformu za rezervaciju, Balkan Drive omogućava putnicima da jednostavno i brzo organizuju svoja putovanja.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row oNama1">
            <div class="col-12">
                <div class="text-center">
                    <hr class="my-4">
                    <p>
                        Kompanija se ponosi svojim visokim standardima bezbjednosti. Svi vozači prolaze stroge provjere i obuke kako bi osigurali da putnici stignu na svoje odredište sigurno i bez problema. Balkan Drive takođe redovno održava svoju flotu vozila kako bi se osiguralo da su u najboljem stanju i spremna za put.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row oNama1">
            <div class="col-12">
                <div class="text-center">
                    <hr class="my-4">
                    <p>
                        Balkan Drive nije samo kompanija za prevoz putnika, već i partner u razvoju lokalnih zajednica. Kroz aktivno učešće u projektima za zaštitu životne sredine, podršku lokalnim inicijativama i angažman u socijalno odgovornim aktivnostima, Balkan Drive demonstrira svoju posvećenost održivom razvoju i dobrobiti zajednice.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row oNama1">
            <div class="col-12">
                <div class="text-center">
                    <hr class="my-4">
                    <p>
                        Sa vizijom da postane lider u transportnoj industriji na Balkanu, Balkan Drive neprestano radi na unapređenju svojih usluga i proširenju svoje prisutnosti kako bi još više ljudi imalo pristup pouzdanom i kvalitetnom prevozu. Uz svoju strast prema inovacijama i neprekidnu predanost kvalitetu, Balkan Drive nastavlja da mijenja način na koji se ljudi kreću i povezuju na Balkanu i šire.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <section class="iskustva">
        <div class="container">
            <div class="section-header">
                <h2 class="title">Šta naši klijenti kažu</h2>
            </div>
            <div class="iskustva-content">
                <div class="swiper iskustva-slider js-iskustva-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide iskustva-item">
                            <div class="info">
                                <img src="zadovoljniKlijenti/2.jpg" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Marijana Anić</h3>
                                </div>
                            </div>
                            <p>Balkan Drive je bio spasitelj kad sam izgubila svoj let na aerodromu. Brzo sam rezervirala automobil preko njihove aplikacije i u roku od 30 minuta bio je vozač ispred aerodromske zgrade. Vožnja je bila udobna i sigurna, a vozač je bio vrlo pažljiv i susretljiv. Zahvaljujući Balkan Drive-u, uspjela sam stići na svoje odredište na vrijeme.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        
                        <div class="swiper-slide iskustva-item">
                            <div class="info">
                                <img src="zadovoljniKlijenti/3.jpg" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Marko Marković</h3>
                                </div>
                            </div>
                            <p>Balkan Drive je rent-a-car agencija koja mi je pružila izvanredno iskustvo. Rezervacija je bila brza i jednostavna putem njihove online platforme. Vozila su bila čista, dobro održavana i opremljena najnovijom tehnologijom. Osoblje je bilo ljubazno i profesionalno, pružajući sve potrebne informacije i podršku. Cijene su bile konkurentne, a usluga iznad očekivanja. Svakako bih preporučio Balkan Drive svima koji traže pouzdanu rent-a-car agenciju na Balkanu.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>

                        <div class="swiper-slide iskustva-item">
                            <div class="info">
                                <img src="zadovoljniKlijenti/4.jpg" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Žarko Petrović</h3>
                                </div>
                            </div>
                            <p>Balkan Drive je bio moj prvi izbor za porodično putovanje ovog ljeta. Rentirali smo automobil za putovanje po Balkanu i bili smo impresionirani kvalitetom usluge. Automobil je bio prostran i udoban, zahvaljujući Balkan Drive-u, naše putovanje bilo je nezaboravno iskustvo.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>

                        <div class="swiper-slide iskustva-item">
                            <div class="info">
                                <img src="zadovoljniKlijenti/5.jpg" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Ana Predić</h3>
                                </div>
                            </div>
                            <p>Kada sam nedavno posjetila Balkan, Balkan Drive je bio moj izbor za rent-a-car uslugu. Bila sam impresionirana njihovim ljubaznim osobljem koje mi je pomoglo odabrati savršeno vozilo za moje potrebe. Automobil je bio čist i udoban, a vožnja je protekla bez ikakvih problema.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>

                        <div class="swiper-slide iskustva-item">
                            <div class="info">
                                <img src="zadovoljniKlijenti/6.jpg" alt="img">
                                <div class="text-box">
                                    <h3 class="name">Aleksa Petrović</h3>
                                </div>
                            </div>
                            <p>Rentirao sam automobil preko Balkan Drive-a za vikend izlet i bio sam zadovoljan. Jednostavna rezervacija, solidna cijena i dobar servis.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>

                        <div class="swiper-slide iskustva-item">
                            <div class="info">
                                <img src="zadovoljniKlijenti/1.jpg" alt="img">
                                <div class="text-box">
                                    <h3 class="name">John Doe</h3>
                                </div>
                            </div>
                            <p>This is very professional, high impact costumer service rent a car agency. Cars are all new, quick take overs , full package . Recommending to everyone who doesn’t wont to have business with low quality rental agencies across the Belgrade.</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination js-iskustva-pagination"></div>
                
                
            </div>
        </div>
    </section>

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
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.js-iskustva-slider',{
            grabCursor:true,
            spaceBetween:30,
            pagination:{
                el:'.js-iskustva-pagination',
                clickable:true
            },
            breakpoints:{
                767:{
                    slidesPerView:2
                }
            }
        });
    </script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>
</html>