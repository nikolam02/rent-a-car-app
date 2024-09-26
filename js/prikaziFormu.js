function prikaziFormu(idAuta) {
    var forma = document.getElementById('rezervacijaForm' + idAuta);
    if (forma.style.display === "none") {
        forma.style.display = "block";
    } else {
        forma.style.display = "none";
    }
}



