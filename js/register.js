function Reset()
{
    document.getElementById("ime").value="";
    document.getElementById("prezime").value="";
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