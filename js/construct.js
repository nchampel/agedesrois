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
    e.preventDefault();
    if (isConstructOKFarm) {
        waitingMessageElt.innerText = 'Construction ferme lancée';
        setTimeout(function () {
            console.log('event settimeout ferme');
            // let townFood = document.getElementById('town-food').innerText;
            // let townWood = document.getElementById('town-wood').innerText;
            // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
            // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');

            constructFarmFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, timeConstructFarm * 1000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources pour lancer la construction de la ferme';
    }

});
// temps d'attente construction scierie
let constructSawmillFormElt = document.getElementById('form-sawmill-construct');
// console.log('event scierie');
constructSawmillFormElt.addEventListener("submit", function (e) {
    console.log('event scierie');
    if (isConstructOKSawmill) {
        waitingMessageElt.innerText = 'Construction scierie lancée';
        e.preventDefault();
        setTimeout(function () {
            constructSawmillFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, timeConstructSawmill * 1000);

    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources pour lancer la construction de la scierie';
    }
});

// temps d'attente construction extracteur
let constructExtractorFormElt = document.getElementById('form-extractor-construct');
// console.log('event scierie');
constructExtractorFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    if (isConstructOKExtractor) {
        waitingMessageElt.innerText = 'Construction extracteur lancé';
        timedProgBar(timeConstructExtractor);
        setTimeout(function () {
            constructExtractorFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, timeConstructExtractor * 1000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources pour lancer la construction de l\'extracteur';
    }

});
// temps d'attente construction carrière
let constructQuarryFormElt = document.getElementById('form-quarry-construct');
// console.log('event scierie');
constructQuarryFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    if (isConstructOKQuarry) {
        waitingMessageElt.innerText = 'Construction carrière lancée';
        setTimeout(function () {
            constructQuarryFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, timeConstructQuarry * 1000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources pour lancer la construction de la carrière';
    }

});
// temps d'attente construction mine
let constructMineFormElt = document.getElementById('form-mine-construct');
// console.log('event scierie');
constructMineFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    if (isConstructOKMine) {
        waitingMessageElt.innerText = 'Construction mine lancée';
        setTimeout(function () {
            constructMineFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, timeConstructMine * 1000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources pour lancer la construction de la mine';
    }

});

// temps d'attente construction atelier
let construcWorkshopFormElt = document.getElementById('form-workshop-construct');
// console.log('event scierie');
construcWorkshopFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    if (isConstructOKWorkshop) {
        waitingMessageElt.innerText = 'Construction atelier lancée';
        timedProgBar(timeConstructWorkshop);
        setTimeout(function () {
            construcWorkshopFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, timeConstructWorkshop * 1000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources pour lancer la construction de l\'atelier';
    }

});



// temps d'attente mise en stock
let stockFormElt = document.getElementById('form-stock');
// console.log('event scierie');
stockFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    if (isStockResourcesOK) {
        waitingMessageElt.innerText = 'Stockage en cours';
        timedProgBar(30);
        setTimeout(function () {
            stockFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, 30000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources à stocker';
    }


});