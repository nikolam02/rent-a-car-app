function Reset()
{
    document.getElementById("email").value="";
    document.getElementById("sifra").value="";
}


function PrikaziPassword()
{
    var x = document.getElementById("sifra");
    if(x.type==="password")
    {
        x.type = "text";
        document.getElementById("oko").style.color = '#e34b89';
    }
    else
    {
        x.type = "password"
        document.getElementById("oko").style.color = '#164863';
    }

    
}


function sakrijLinkove() 
{
    var linkUlogujSe = document.querySelector('.signUp');
    var linkRegistrujSe = document.querySelector('.registration');

    // Postavite stilove za sakrivanje linkova
    linkUlogujSe.style.display = 'none';
    linkRegistrujSe.style.display = 'none';
}
