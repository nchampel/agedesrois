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
                formElt.submit();
            }, time * 1000);
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
                formElt.submit();
            }, time * 1000);
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
// console.log('event scierie');
stockFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    if (isStockResourcesOK) {
        waitingMessageElt.innerText = 'Stockage en cours';
        timedProgBar(10);
        setTimeout(function () {
            stockFormElt.submit();
            // document.getElementById('form-save-resources').submit();
        }, 10000);
    } else {
        waitingMessageElt.innerText = 'Pas assez de ressources à stocker';
    }


});