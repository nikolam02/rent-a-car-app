<?php

@include "config.php";
session_start();
if(isset($_POST["odjaviSe"]))
{
    session_unset();
    session_destroy();
    header("location:loginPage.php");
}

// automatsko brisanje auta na osnovu datuma
$trenutniDatum = date("Y-m-d");

$selectIdAutomobilaTrenutniDatum = "SELECT * FROM rezervacija WHERE datumVracanja <= '$trenutniDatum'";
$rezIdAutomobilaTrenutniDatum = mysqli_query($konekcija, $selectIdAutomobilaTrenutniDatum);

if ($rezIdAutomobilaTrenutniDatum) {
    if (mysqli_num_rows($rezIdAutomobilaTrenutniDatum) > 0) {
        while ($row = mysqli_fetch_assoc($rezIdAutomobilaTrenutniDatum)) {
            $idAutomobila = mysqli_real_escape_string($konekcija, $row['idAuta']);
            
            // Prvo brišemo sve rezervacije vezane za taj automobil
            $brisanjeRezervacijaAutomobila = "DELETE FROM rezervacija WHERE idAuta = '$idAutomobila'";
            mysqli_query($konekcija, $brisanjeRezervacijaAutomobila);
            
            // Zatim brišemo sam automobil
            $brisanjeAutomobila = "DELETE FROM automobil WHERE idAuta = '$idAutomobila'";
            mysqli_query($konekcija, $brisanjeAutomobila);
        }
    }
}


$brisanjeDatuma = "DELETE FROM rezervacija WHERE datumVracanja<='$trenutniDatum' ";
mysqli_query($konekcija,$brisanjeDatuma);


//broji korisnike
$brojKorisnikaUpit = "SELECT * FROM korisnik";
$brojKorisnika = mysqli_query($konekcija,$brojKorisnikaUpit);
mysqli_num_rows($brojKorisnika);
$bKorisnika = mysqli_num_rows($brojKorisnika);

//broji automobile
$brojAutaUpit = "SELECT * FROM automobil";
$brojAuta = mysqli_query($konekcija,$brojAutaUpit);
mysqli_num_rows($brojAuta);
$bAuta = mysqli_num_rows($brojAuta);

//broji rezervacije
$brojRezervacijaUpit = "SELECT * FROM rezervacija";
$brojRezervacija = mysqli_query($konekcija,$brojRezervacijaUpit);
mysqli_num_rows($brojRezervacija);
$bRezervacija = mysqli_num_rows($brojRezervacija);


//racunaj profit
$profit = 0;
$profitUpit = "SELECT r.*, a.cena FROM rezervacija r JOIN automobil a ON r.idAuta = a.idAuta";
$rez = mysqli_query($konekcija, $profitUpit);

if (mysqli_num_rows($rez) > 0) {
    while ($row = mysqli_fetch_assoc($rez)) {
        $datum_preuzimanja = strtotime($row["datumPreuzimanja"]);
        $datum_vracanja = strtotime($row["datumVracanja"]);
        
        $broj_dana = ceil(($datum_vracanja - $datum_preuzimanja) / (60 * 60 * 24));
        
        $cena_po_danu = $row["cena"];
        $ukupna_cena = $cena_po_danu * $broj_dana;

        // Ažuriraj ukupnu cenu u tabeli rezervacija (pretpostavljajući da je kolona 'ukupnaCena' u tabeli 'rezervacija')
        $updateQuery = "UPDATE rezervacija SET cena = $ukupna_cena WHERE idAuta = " . $row["idAuta"];
        mysqli_query($konekcija, $updateQuery);

        $profit += $ukupna_cena;
    }


    $profitUpit1 = "SELECT SUM(cena) AS ukupniProfit FROM rezervacija";
    $rez1 = mysqli_query($konekcija, $profitUpit1);
    
    if ($rez1) {
        $row = mysqli_fetch_assoc($rez1);
        $profit = $row['ukupniProfit'] ? $row['ukupniProfit'] : 0; // Ako nema rezervacija, profit će biti 0
    } else {
        $profit = 0; // U slučaju greške
    }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Balkan Drive | Menadzer panel</title>
<link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
<link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="icons/css/all.css">
<link rel="stylesheet" href="icons/css/all.min.css">
<link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
//provera da li je admin ulogovan
if(isset($_SESSION['menadzer_name']))
{
    ?>
    <!-- sidenav -->
    <div id="myNav" class="overlay">
    
    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    
    <!-- Overlay content -->
    <div class="overlay-content">
    <form action="dodajAutomobil.php" method="post">
    <input type="submit" value="Dodaj novi auto" class="buttonMenu" name="dodajAuto">
    </form>
    <form action="izmeniAutomobil.php">
    <input type="submit" value="Izmeni auto" class="buttonMenu" name="izmeniAuto">
    </form>
    <form action="obrisiAutomobil.php">
    <input type="submit" value="Obriši auto" class="buttonMenu" name="obrisiAuto">
    </form>
    <form action="obrisiRezervaciju.php">
    <input type="submit" value="Obriši rezervaciju" class="buttonMenu" name="obrisiRezervaciju">
    </form>
    
    <form action="pregledPoruka.php" method="post">
    <input type="submit" value="Pregled poruka" class="buttonMenu" name="pregledPoruka">
    </form>
    
    <form method="post">
    <input type="submit" value="Odjavi se" id="buttonOdjaviSe" name="odjaviSe">
    </form>
    </div>
    
    </div>
    <!-- sidenav kraj -->
    
    
    <!-- navigacia -->
    <div class="topnav">
    <a href="#" onclick="openNav()">Upravljanje podacima</a>
    <?php
    echo "<a class='split'>".$_SESSION['menadzer_name']." ".$_SESSION['menadzer_lastname']."</a>";
    if($_SESSION['menadzer_name']=='Dragan' && $_SESSION['menadzer_lastname']=='Petkovic')
    {
        ?>
        <a class="split"> <img src="AdminProfilePic/profilna1.jpg" id="profilna"></a>
        <?php
    }
    else
    {
        ?>
        <a class="split"> <img src="AdminProfilePic/admin.png" id="profilna"></a>
        <?php
    }
    ?>
    
    </div>
    <!-- navigacia kraj -->
    
    <main>
    <div class="container text-center">
    <div class="row">
    <div class="col-sm" id="korisnici">
    <h1 class="naslov">Broj korisnika</h1>
    <i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i>
    <h1 class="prikazVrednost" id="prikazV">0</h1>
    <input type="text" value="<?php echo $bKorisnika; ?>" class="pravaVrednost" id="pVrednost">
    <div class="submit">
    <form method="post">
    <input type="submit" value="Prikaži sve korisnike" class="submitButton1" name="prikaziSveKorisnike">
    </form>
    </div>
    </div>
    <div class="col-sm" id="automobili">
    <h1 class="naslov">Broj automobila </h1>
    <i class="fa-solid fa-plane-up fa-2xl" style="color: #ffffff;"></i>
    <h1 class="prikazVrednost" id="prikazV1">0</h1>
    <input type="text" value="<?php echo $bAuta; ?>" class="pravaVrednost" id="pVrednost1">
    <div class="submit">
    <form method="post">
    <input type="submit" value="Prikaži sve automobile" class="submitButton2" name="prikaziSveAutomobile">
    </form>
    </div>
    </div>
    <div class="col-sm" id="rezervacije">
    <h1 class="naslov">Broj rezervacija </h1>
    <i class="fa-solid fa-plane-up fa-2xl" style="color: #ffffff;"></i>
    <h1 class="prikazVrednost" id="prikazV2">0</h1>
    <input type="text" value="<?php echo $bRezervacija; ?>" class="pravaVrednost" id="pVrednost2">
    <div class="submit">
    <form method="post">
    <input type="submit" value="Prikaži sve rezervacije" class="submitButton3" name="prikaziSveRezervacije">
    </form>
    </div>
    </div>
    <div class="col-sm" id="profit">
    <h1 class="naslov">Profit</h1>
    <i class="fa-solid fa-money-bill fa-2xl" style="color: #ffffff;"></i>
    <div class="spoji">
        <h1 class="prikazVrednost" id="prikazV3"><?php echo $profit; ?></h1> <!-- Prikaz profita ovde -->
        <h1 class="prikazVrednost">&euro;</h1>
         <input type="text" value="<?php echo $profit; ?>" class="pravaVrednost" id="pVrednost3" readonly>
    </div>
</div>
    </div>
    </div>
    </div>   
    <!-- ispis podataka iz baze u zavisnosti koje dugme je kliknuto -->
    <div class="ispisPodataka">
    <?php
    
    
    // uspesno ubacen
    if(isset($_SESSION['uspesnoUbacen']))
    {
        echo"<span class='uspesnoUbacen'>".$_SESSION['uspesnoUbacen']."</span>";
        unset($_SESSION['uspesnoUbacen']);
    }
    
    //korisnici
    if(isset($_POST["prikaziSveKorisnike"]))
    {
        
        $prikaziKorisnike = "SELECT * FROM korisnik ORDER BY CASE WHEN email='admin@admin.com' THEN 0 ELSE 1 END, email";
        
        $rezultat = mysqli_query($konekcija,$prikaziKorisnike);
        if(mysqli_num_rows($rezultat)>0)
        {
            ?>
            <table>
            <tr>
            <th>Id</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Id rezervacije</th>
            </tr>
            
            <?php
            while($row = mysqli_fetch_assoc($rezultat))
            {
                ?>
                <tr>
                <?php
                if($row["email"]=="admin@admin.com")
                {
                    ?>
                    <td>x</td>
                    <td><?php echo $row["ime"]?></td>
                    <td><?php echo $row["prezime"]?></td>
                    <td>
                    <span class="admin">ADMIN</span>
                    </td>
                    <td>/</td>
                    <?php
                }
                else if(strpos($row['email'], '@manager.com')){

                    ?>
                    <td>x</td>
                    <td><?php echo $row["ime"]?></td>
                    <td><?php echo $row["prezime"]?></td>
                    <td>
                    <span class="admin">MENADZER</span>
                    </td>
                    <td>/</td>
                    <?php
                }
                else
                {
                    ?>
                    <td><?php echo $row["id"]?></td>
                    <td><?php echo $row["ime"]?></td>
                    <td><?php echo $row["prezime"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td>
                    <?php   
                    if($row["idRezervacije"] == null || $row["idRezervacije"] == 0)
                    {
                        echo "Nema rezervaciju";
                    }
                    else
                    {
                        echo $row['idRezervacije'];
                    }
                    ?>
                    </td>
                    <?php
                }
                ?>
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
        
        
    }  
    //Automobili
    if(isset($_POST["prikaziSveAutomobile"]))
    {
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
            <th>GPS</th>
            <th>Cena</th>
            </tr>
            
            <?php
            while($row = mysqli_fetch_assoc($rezultat))
            {
                ?>
                <tr>
                <td><?php echo $row["idAuta"]?></td>
                <td><?php echo $row["marka"]?>
                <td><?php echo $row["tipVozila"]?>
                <td><?php echo $row["gorivo"]?>
                <td><?php echo $row["menjac"]?>
                <td><?php echo $row["klima"]?>
                <td><?php echo $row["gps"]?>
                <td><?php echo $row["cena"]?> &euro;</td>
                </tr>
                <br>
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
    }

    if(isset($_POST["prikaziSveRezervacije"]))
    {
        $prikaziAutomobile = "SELECT * FROM rezervacija";
        
        $rezultat = mysqli_query($konekcija,$prikaziAutomobile);
        if(mysqli_num_rows($rezultat)>0)
        {
            ?>
            <table>
            <tr>
            <th>Id rezervacije</th>
            <th>Id auta</th>
            <th>Id korisnika</th>
            <th>Datum preuzimanja</th>
            <th>Datum vraćanja</th>
            <th>Vreme preuzimanja</th>
            <th>Vreme vraćanja</th>
            <th>Cena</th>
            </tr>
            
            <?php
            while($row = mysqli_fetch_assoc($rezultat))
            {
                ?>
                <tr>
                <td><?php echo $row["idRezervacije"]?></td>
                <td><?php echo $row["idAuta"]?>
                <td><?php echo $row["idKorisnika"]?>
                <td><?php echo $row["datumPreuzimanja"]?>
                <td><?php echo $row["datumVracanja"]?>
                <td><?php echo $row["vremePreuzimanja"]?>
                <td><?php echo $row["vremeVracanja"]?>
                <td><?php echo $row["cena"]?> &euro;</td>
                </tr>
                <br>
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
    }
    
    ?>
    </div>    
    </main>
    <?php
}
else
{
    ?>
    <div class="nijeUlogovan">
    <span id='adminNijeUlogovan'>Morate biti ulogovani kao menadzer da bi pristupili Menadzer panel-u ! <br> <a href="loginPage.php" id="linkNijeUlogovan">Vrati se na login</a></span>
    </div>
    <?php
}
?>
<script src='https://code.jquery.com/jquery-1.8.2.js'></script>
<script src="js/admin.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>
</html>