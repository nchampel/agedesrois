let waitingMessageElt = document.getElementById('waiting-message');

function construction(food, time) {

    let level = document.getElementById('farm-level').innerText;
    let townFood = document.getElementById('town-food').innerText;
    console.log(level);
    parseFloat(level);
    parseFloat(townFood);
    if (townFood - food >= 0) {
        townFood = townFood - food;
        document.getElementById('town-food').innerText = townFood;
        fetch('http://localhost:8080/LageDesRois/backend/constructSubstractResources.php?food=' + townFood);
        setTimeout(function () {
            fetch('http://localhost:8080/LageDesRois/backend/construct.php?type=farm&level=' + level);
            level++;
            document.getElementById('farm-level').innerText = level;
        }, time * 1000);
    }

    function saveResources() {

    }

}
// temps d'attente construction ferme
let constructFarmFormElt = document.getElementById('form-farm-construct');
// console.log(timeConstructFarm);
// console.log('event ferme');
constructFarmFormElt.addEventListener("submit", function (e) {
    waitingMessageElt.innerText = 'Construction ferme lancée';
    e.preventDefault();
    setTimeout(function () {
        console.log('event settimeout ferme');
        // let townFood = document.getElementById('town-food').innerText;
        // let townWood = document.getElementById('town-wood').innerText;
        // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
        // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');

        constructFarmFormElt.submit();
        // document.getElementById('form-save-resources').submit();
    }, timeConstructFarm * 1000);
});
// temps d'attente construction scierie
let constructSawmillFormElt = document.getElementById('form-sawmill-construct');
// console.log('event scierie');
constructSawmillFormElt.addEventListener("submit", function (e) {
    waitingMessageElt.innerText = 'Construction scierie lancée';
    e.preventDefault();
    setTimeout(function () {
        constructSawmillFormElt.submit();
        // document.getElementById('form-save-resources').submit();
    }, timeConstructSawmill * 1000);
});
// temps d'attente construction extracteur
let constructExtractorFormElt = document.getElementById('form-extractor-construct');
// console.log('event scierie');
constructExtractorFormElt.addEventListener("submit", function (e) {
    waitingMessageElt.innerText = 'Construction extracteur lancé';
    e.preventDefault();
    setTimeout(function () {
        constructExtractorFormElt.submit();
        // document.getElementById('form-save-resources').submit();
    }, timeConstructExtractor * 1000);
});
// temps d'attente construction carrière
let constructQuarryFormElt = document.getElementById('form-quarry-construct');
// console.log('event scierie');
constructQuarryFormElt.addEventListener("submit", function (e) {
    waitingMessageElt.innerText = 'Construction carrière lancée';
    e.preventDefault();
    setTimeout(function () {
        constructQuarryFormElt.submit();
        // document.getElementById('form-save-resources').submit();
    }, timeConstructQuarry * 1000);
});
// temps d'attente construction mine
let constructMineFormElt = document.getElementById('form-mine-construct');
// console.log('event scierie');
constructMineFormElt.addEventListener("submit", function (e) {
    waitingMessageElt.innerText = 'Construction mine lancée';
    e.preventDefault();
    setTimeout(function () {
        constructMineFormElt.submit();
        // document.getElementById('form-save-resources').submit();
    }, timeConstructMine * 1000);
});


// temps d'attente mise en stock
let stockFormElt = document.getElementById('form-stock');
// console.log('event scierie');
stockFormElt.addEventListener("submit", function (e) {
    waitingMessageElt.innerText = 'Stockage en cours';
    e.preventDefault();
    setTimeout(function () {
        stockFormElt.submit();
        // document.getElementById('form-save-resources').submit();
    }, 60000);
});