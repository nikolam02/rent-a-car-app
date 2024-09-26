// Funkcija koja skriva linkove "Uloguj se" i "Registruj se" nakon prijave
function sakrijDugmad() {
    var linkPrijaviSe = document.getElementById('linkPrijaviSe');
    var linkRegistrujSe = document.getElementById('linkRegistrujSe');

    linkPrijaviSe.style.display = 'none';
    linkRegistrujSe.style.display = 'none';
}
