<?php

@include "config.php";

session_start();

@$emailProvera = $_POST["email"];
@$sifraProvera = $_POST["sifra"];

if(isset($_POST["prijaviSe"]))
{
    if(empty($emailProvera)||empty($sifraProvera))
    {
        $error[] = "Morate popuniti sva polja za unos!";
    }
    else
    {
            $email = mysqli_real_escape_string($konekcija,$_POST["email"]);
            $sifra =md5($_POST["sifra"]);

            $upitProvere = "SELECT * FROM korisnik WHERE email='$email' && sifra='$sifra'";
            $rezultatProvere = mysqli_query($konekcija,$upitProvere);

            if(mysqli_num_rows($rezultatProvere)>0)
            {
                $row = mysqli_fetch_array($rezultatProvere);
                if($row['email']=='admin@admin.com')
                {
                    $_SESSION['admin_name'] = $row['ime'];
                    $_SESSION['admin_lastname'] = $row['prezime'];
                    header("location:admin.php");
                }
                else if (strpos($row['email'], '@manager.com') !== false) {
                    $_SESSION['menadzer_name'] = $row['ime'];
                    $_SESSION['menadzer_lastname'] = $row['prezime'];
                    $_SESSION['menadzer_email'] = $row['email'];
                    header("location:menadzer.php");
                }
                else
                {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['ime'];
                    $_SESSION['user_lastName'] = $row['prezime'];
                    $_SESSION['user_email'] = $row['email'];
                    header("location:index.php");
                }
            }
            else
            {
                $error[] = "Pogrešan e-mail ili šifra!";
            }   
    }
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balkan Drive | Prijava</title>
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <link rel="shortcut icon" href="logo/logo7.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.css">
    <link rel="stylesheet" href="icons/css/all.min.css">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body onload="Reset()">
    <main>
        <!-- center -->
        <div class="position-absolute top-50 start-50 translate-middle"> 
            <!-- loginbox -->
            <div class="card mb-4" style="max-width: 30rem;" id="loginbox">
                <form class="card-body" method="post" onsubmit="sakrijLinkove()">
                    
                    <!-- logo -->
                    <a href="index.php"><img src="logo/logo7.png" class="logo rounded mx-auto d-block" style="width: 225px; height: 150px;"></a> 
                    <!-- email -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope" style="color:  rgb(228, 179, 17);"></i></span>
                        <input type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1" id="email" name="email">
                    </div>
                    
                    <!-- password -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock" style="color:  rgb(228, 179, 17)"></i></span>
                        <input type="password" class="form-control" placeholder="Šifra" aria-describedby="basic-addon1" id="sifra" maxlength="16" name="sifra">
                        <span class="input-group-text" id="passwordEye" onclick="PrikaziPassword()"><i id="oko" class="fa-solid fa-eye" style="color:  rgb(228, 179, 17);"></i></span>
                    </div>
                    
                    <!-- prikaz greske prilikom praznog unosa -->
                    <?php
                    
                    if(isset($error))
                    {
                        foreach($error as $error)
                        {
                            echo"<span class='greskaPrazno'>".$error."</span>";
                        }
                        
                    }

                    ?>
                    <!-- uspesna registracija poruka -->
                    <?php
                    
                    if(isset($_SESSION['uspesnaReg']))
                    {
                        echo"<span class='uspesnaReg'>".$_SESSION['uspesnaReg']."</span>";
                        unset($_SESSION['uspesnaReg']);
                    }

                    ?>
                    
                    <!-- napravi nalog -->
                    <div>
                        <p id="napraviNalog">Nemate nalog? <a href="register.php" id="link">Napravi nalog</a></p>
                    </div>
                    
                    <!-- button prijavi se -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a id="linkPocetna"><input type="submit" class="btn btn-outline-light" id="button" name="prijaviSe" value="Prijavi se"></input></a> 
                    </div>   
                    
                </form>  
            </div>
            <!-- kraj loginboxa -->
        </div>
        <!-- center kraj -->

    </main>
    <script src="js/login.js"></script>
</body>
</html>