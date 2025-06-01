function czas() {
    let data = new Date()

    let godziny = data.getHours()
    let minuty = data.getMinutes()
    let sekundy = data.getSeconds()

    let dzien = data.getDate()
    let miesiac = data.getMonth() + 1

    if (dzien < 10) dzien = "0" + dzien
    if (miesiac < 10) miesiac = "0" + miesiac
    if (godziny < 10) godziny = "0" + godziny
    if (minuty < 10) minuty = "0" + minuty
    if (sekundy < 10) sekundy = "0" + sekundy

    let tekst = dzien + "." + miesiac + " - " + godziny + ":" + minuty + ":" + sekundy

    document.getElementById("czas").innerHTML = tekst
}

setInterval(czas, 1000)
czas()