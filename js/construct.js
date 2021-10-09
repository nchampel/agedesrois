let waitingMessageElt = document.getElementById('flash-message');

// console.log(document.getElementById('transfer-food'));

// document.getElementById('transfer-food').innerText = 0;
// document.getElementById('transfer-wood').innerText = 0;
// document.getElementById('transfer-metal').innerText = 0;
// document.getElementById('transfer-stone').innerText = 0;
// document.getElementById('transfer-gold').innerText = 0;

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
}

function saveResources() {
    let pseudo = document.getElementById('pseudo').innerText;
    // console.log('function addTownFood');
    let townFood = document.getElementById('town-food').innerText;
    let townWood = document.getElementById('town-wood').innerText;
    let townMetal = document.getElementById('town-metal').innerText;
    let townStone = document.getElementById('town-stone').innerText;
    let townGold = document.getElementById('town-gold').innerText;
    let townBow = document.getElementById('town-bow').innerText;
    let townCrossbow = document.getElementById('town-crossbow').innerText;

    //qd je développe en local

    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);//.then(response => console.log(response.text()));
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);

    //pour que cela fonctionne en ligne

    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);//.then(response => console.log(response.text()));
    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    // fetch('http://agedesrois.alwaysdata.net/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);

}

function waitingTimeConstruct(type) {
    let id = "";
    let name = "";
    let isOK = false;
    let answer = "";
    switch (type) {
        case 'farm':
            id = 'form-farm-construct';
            name = 'ferme lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la ferme';
            isOK = isConstructOKFarm;
            time = timeConstructFarm;
            break;
        case 'sawmill':
            id = 'form-sawmill-construct';
            name = 'scierie lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la scierie';
            isOK = isConstructOKSawmill;
            time = timeConstructSawmill;
            break;
        case 'extractor':
            id = 'form-extractor-construct';
            name = 'extracteur lancée';
            answer = 'Pas assez de ressources pour lancer la construction de l\'extracteur';
            isOK = isConstructOKExtractor;
            time = timeConstructExtractor;
            break;
        case 'quarry':
            id = 'form-quarry-construct';
            name = 'carrière lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la carrière';
            isOK = isConstructOKQuarry;
            time = timeConstructQuarry;
            break;
        case 'mine':
            id = 'form-mine-construct';
            name = 'mine lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la mine';
            isOK = isConstructOKMine;
            time = timeConstructMine;
            break;
        case 'workshop':
            id = 'form-workshop-construct';
            name = 'atelier lancée';
            answer = 'Pas assez de ressources pour lancer la construction de l\'atelier';
            isOK = isConstructOKWorkshop;
            time = timeConstructWorkshop;
            break;
    }
    let formElt = document.getElementById(id);
    formElt.addEventListener("submit", function (e) {
        e.preventDefault();
        if (isOK) {
            waitingMessageElt.innerText = 'Construction ' + name;
            timedProgBar(time);
            setTimeout(function () {
                console.log('event settimeout ferme');
                // let townFood = document.getElementById('town-food').innerText;
                // let townWood = document.getElementById('town-wood').innerText;
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                saveResources(); //marche pas
                formElt.submit();
            }, time * 1000 + 2000);
        } else {
            waitingMessageElt.innerText = answer;
        }
    });
}

function waitingTimeTraining(type) {
    let id = "";
    let name = "";
    let isOK = false;
    let answer = "";
    switch (type) {
        case 'archer':
            id = 'form-archer-training';
            name = 'archer lancée';
            answer = 'Pas assez de ressources pour lancer l\'amélioration de l\'archer';
            isOK = isTrainingOKArcher;
            time = timeTrainingArcher;
            break;
    }
    let formElt = document.getElementById(id);
    formElt.addEventListener("submit", function (e) {
        e.preventDefault();
        if (isOK) {
            waitingMessageElt.innerText = 'Amélioration ' + name;
            timedProgBar(time);
            setTimeout(function () {
                console.log('event settimeout ferme');
                // let townFood = document.getElementById('town-food').innerText;
                // let townWood = document.getElementById('town-wood').innerText;
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                saveResources();
                formElt.submit();
            }, time * 1000 + 2000);
        } else {
            waitingMessageElt.innerText = answer;
        }
    });
}

let types = ['farm', 'sawmill', 'extractor', 'quarry', 'mine', 'workshop'];
types.forEach(function (type) {
    waitingTimeConstruct(type);
});

let trainingTypes = ['archer'];
trainingTypes.forEach(function (trainingType) {
    waitingTimeTraining(trainingType);
});

// temps d'attente mise en stock
let stockFormElt = document.getElementById('form-stock');

// console.log(stockFormElt);
stockFormElt.addEventListener("submit", function (e) {
    let foodToStock = document.getElementById('transfer-food').value;
    let woodToStock = document.getElementById('transfer-wood').value;
    let metalToStock = document.getElementById('transfer-metal').value;
    let stoneToStock = document.getElementById('transfer-stone').value;
    let goldToStock = document.getElementById('transfer-gold').value;
    if (parseInt(foodTown) >= parseInt(foodToStock) &&
        parseInt(woodTown) >= parseInt(woodToStock) &&
        parseInt(metalTown) >= parseInt(metalToStock) &&
        parseInt(stoneTown) >= parseInt(stoneToStock) &&
        parseInt(goldTown) >= parseInt(goldToStock)
    ) {
        isStockResourcesOK = true;
    } else {
        isStockResourcesOK = false;
    }
    console.log('event stockage');
    console.log(metalToStock);
    e.preventDefault();
    if (isStockResourcesOK) {
        waitingMessageElt.innerText = 'Stockage en cours';
        timedProgBar(60);
        setTimeout(function () {
            saveResources();
            stockFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, 60000 + 4000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources à stocker';
    }


});