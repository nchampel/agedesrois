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

    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);//.then(response => console.log(response.text()));
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);

}

if (levelCastle <= levelFarm) {
    document.getElementById('btn-farm').disabled = true;
    document.getElementById('not-displayed-farm').style.display = 'block';
}
if (levelCastle <= levelSawmill) {
    document.getElementById('btn-sawmill').disabled = true;
    document.getElementById('not-displayed-sawmill').style.display = 'block';
}
if (levelCastle <= levelExtractor) {
    document.getElementById('btn-extractor').disabled = true;
    document.getElementById('not-displayed-extractor').style.display = 'block';
}
if (levelCastle <= levelQuarry) {
    document.getElementById('btn-quarry').disabled = true;
    document.getElementById('not-displayed-quarry').style.display = 'block';
}
if (levelCastle <= levelMine) {
    document.getElementById('btn-mine').disabled = true;
    document.getElementById('not-displayed-mine').style.display = 'block';
}
if (levelCastle <= levelBarracks) {
    document.getElementById('btn-barracks').disabled = true;
    document.getElementById('not-displayed-barracks').style.display = 'block';
}

function waitingTimeConstruct(type) {
    let id = "";
    let name = "";
    // let isOK = false;
    let answer = "";
    let food = '';
    let wood = '';
    let metal = '';
    let stone = '';
    let gold = '';
    switch (type) {
        case 'castle':
            id = 'form-castle-construct';
            name = 'château lancée';
            answer = 'Pas assez de ressources pour lancer la construction du château';
            // isOK = isConstructOKFarm;
            time = timeConstructCastle;
            food = castleFood;
            wood = castleWood;
            metal = castleMetal;
            stone = castleStone;
            gold = castleGold;
            break;
        case 'farm':
            id = 'form-farm-construct';
            name = 'ferme lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la ferme';
            // isOK = isConstructOKFarm;
            time = timeConstructFarm;
            food = farmFood;
            wood = farmWood;
            metal = farmMetal;
            stone = farmStone;
            gold = farmGold;
            break;
        case 'sawmill':
            id = 'form-sawmill-construct';
            name = 'scierie lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la scierie';
            // isOK = isConstructOKSawmill;
            time = timeConstructSawmill;
            food = sawmillFood;
            wood = sawmillWood;
            metal = sawmillMetal;
            stone = sawmillStone;
            gold = sawmillGold;
            break;
        case 'extractor':
            id = 'form-extractor-construct';
            name = 'extracteur lancée';
            answer = 'Pas assez de ressources pour lancer la construction de l\'extracteur';
            // isOK = isConstructOKExtractor;
            time = timeConstructExtractor;
            food = extractorFood;
            wood = extractorWood;
            metal = extractorMetal;
            stone = extractorStone;
            gold = extractorGold;
            break;
        case 'quarry':
            id = 'form-quarry-construct';
            name = 'carrière lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la carrière';
            // isOK = isConstructOKQuarry;
            time = timeConstructQuarry;
            food = quarryFood;
            wood = quarryWood;
            metal = quarryMetal;
            stone = quarryStone;
            gold = quarryGold;
            break;
        case 'mine':
            id = 'form-mine-construct';
            name = 'mine lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la mine';
            // isOK = isConstructOKMine;
            time = timeConstructMine;
            food = mineFood;
            wood = mineWood;
            metal = mineMetal;
            stone = mineStone;
            gold = mineGold;
            break;
        case 'barracks':
            id = 'form-barracks-construct';
            name = 'caserne lancée';
            answer = 'Pas assez de ressources pour lancer la construction de la caserne';
            // isOK = isConstructOKMine;
            time = timeConstructBarracks;
            food = barracksFood;
            wood = barracksWood;
            metal = barracksMetal;
            stone = barracksStone;
            gold = barracksGold;
            break;
    }
    let formElt = document.getElementById(id);
    // console.log(formElt);
    formElt.addEventListener("submit", function (e) {
        e.preventDefault();
        // fetch('http://localhost:8080/LageDesRois/backend/connexion.php');
        // console.log(formElt);
        let townFoodUpdate = document.getElementById('town-food').innerText;
        // console.log(townFoodUpdate);
        townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
        let townWoodUpdate = parseFloat(transformFormatNumber(document.getElementById('town-wood').innerText));
        // console.log(townWoodUpdate);
        let townMetalUpdate = parseFloat(transformFormatNumber(document.getElementById('town-metal').innerText));
        let townStoneUpdate = parseFloat(transformFormatNumber(document.getElementById('town-stone').innerText));
        let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
        // console.log(townFoodUpdate);
        // console.log(food);
        if (townFoodUpdate >= food && townWoodUpdate >= wood && townMetalUpdate >= metal && townStoneUpdate >= stone && townGoldUpdate >= gold) {
            // if (isOK) {
            waitingMessageElt.innerText = 'Construction ' + name;
            timedProgBar(time);
            setTimeout(function () {
                // console.log('event settimeout ferme');
                // let townFood = document.getElementById('town-food').innerText;
                // let townWood = document.getElementById('town-wood').innerText;
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                // saveResources(); //marche pas

                formElt.submit();
            }, time * 1000 + 2000);
        } else {
            // console.log('bug');
            waitingMessageElt.innerText = answer;
        }
    });
}

function waitingTimeConstructStock(type) {
    let id = "";
    let name = "";
    let isOK = false;
    let answer = "";
    let food = '';
    let wood = '';
    let metal = '';
    let stone = '';
    let gold = '';

    switch (type) {
        case 'workshop':
            id = 'form-workshop-construct';
            name = 'atelier lancée';
            answer = 'Pas assez de ressources pour lancer la construction de l\'atelier';
            isOK = isConstructOKWorkshop;
            time = timeConstructWorkshop;
            food = workshopFood;
            wood = workshopWood;
            metal = workshopMetal;
            stone = workshopStone;
            gold = workshopGold;
            break;
    }
    let formElt = document.getElementById(id);
    // console.log(formElt);
    formElt.addEventListener("submit", function (e) {
        e.preventDefault();
        // fetch('http://localhost:8080/LageDesRois/backend/connexion.php');
        let stockFoodUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-food').innerText));
        let stockWoodUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-wood').innerText));
        let stockMetalUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-metal').innerText));
        let stockStoneUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-stone').innerText));
        let stockGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-gold').innerText));
        // console.log(stockFoodUpdate);
        if (stockFoodUpdate >= food && stockWoodUpdate >= wood && stockMetalUpdate >= metal && stockStoneUpdate >= stone && stockGoldUpdate >= gold) {
            // if (isOK) {
            waitingMessageElt.innerText = 'Construction ' + name;
            timedProgBar(time);
            setTimeout(function () {
                // console.log('event settimeout ferme');
                // let townFood = document.getElementById('town-food').innerText;
                // let townWood = document.getElementById('town-wood').innerText;
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                // saveResources(); //marche pas

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
    let food = '';
    let gold = '';
    let bow = 0;
    let crossbow = 0;

    switch (type) {
        case 'archer':
            id = 'form-archer-training';
            name = 'archer lancée';
            answer = 'Pas assez de ressources pour lancer l\'amélioration de l\'archer';
            isOK = isTrainingOKArcher;
            time = timeTrainingArcher;
            food = archerFood;
            gold = archerGold;
            bow = archerBow;
            // crossbow = archerCrossbow;
            break;
    }
    let formElt = document.getElementById(id);
    formElt.addEventListener("submit", function (e) {
        e.preventDefault();
        let townFoodUpdate = document.getElementById('town-food').innerText;
        townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
        let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
        let townBowUpdate = parseFloat(transformFormatNumber(document.getElementById('town-bow').innerText));
        if (townFoodUpdate >= food && townGoldUpdate >= gold && townBowUpdate >= bow) {
            // if (isOK) {
            waitingMessageElt.innerText = 'Amélioration ' + name;
            timedProgBar(time);
            setTimeout(function () {
                // console.log('event settimeout ferme');
                // let townFood = document.getElementById('town-food').innerText;
                // let townWood = document.getElementById('town-wood').innerText;
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                // saveResources();
                formElt.submit();
            }, time * 1000 + 2000);
        } else {
            waitingMessageElt.innerText = answer;
        }
    });
}

let typesTown = ['farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks', 'castle'];
typesTown.forEach(function (type) {
    waitingTimeConstruct(type);
});

let typesStock = ['workshop'];
typesStock.forEach(function (type) {
    waitingTimeConstructStock(type);
});

let trainingTypes = ['archer'];
trainingTypes.forEach(function (trainingType) {
    waitingTimeTraining(trainingType);
});

// temps d'attente mise en stock
let stockFormElt = document.getElementById('form-stock');

// console.log(stockFormElt);
stockFormElt.addEventListener("submit", function (e) {
    let townFoodUpdate = document.getElementById('town-food').innerText;
    // console.log(townFoodUpdate);
    townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
    let townWoodUpdate = parseFloat(transformFormatNumber(document.getElementById('town-wood').innerText));
    // console.log(townWoodUpdate);
    let townMetalUpdate = parseFloat(transformFormatNumber(document.getElementById('town-metal').innerText));
    let townStoneUpdate = parseFloat(transformFormatNumber(document.getElementById('town-stone').innerText));
    let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
    let foodToStock = document.getElementById('transfer-food').value;
    let woodToStock = document.getElementById('transfer-wood').value;
    let metalToStock = document.getElementById('transfer-metal').value;
    let stoneToStock = document.getElementById('transfer-stone').value;
    let goldToStock = document.getElementById('transfer-gold').value;
    if (townFoodUpdate >= parseInt(foodToStock) &&
        townWoodUpdate >= parseInt(woodToStock) &&
        townMetalUpdate >= parseInt(metalToStock) &&
        townStoneUpdate >= parseInt(stoneToStock) &&
        townGoldUpdate >= parseInt(goldToStock)
    ) {
        isStockResourcesOK = true;
    } else {
        isStockResourcesOK = false;
    }
    // console.log('event stockage');
    // console.log(metalToStock);
    e.preventDefault();
    if (isStockResourcesOK) {
        waitingMessageElt.innerText = 'Stockage en cours';
        timedProgBar(10);
        setTimeout(function () {
            // saveResources();
            stockFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, 10000 + 4000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources à stocker';
    }


});