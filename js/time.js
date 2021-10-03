let nf = Intl.NumberFormat("fr-FR", true);

function transformFormatNumber(number) {
    console.log('format');
    let numberExploded = number.split("");
    console.log(numberExploded);
    let numberIndex = numberExploded.indexOf(" ");
    console.log(numberIndex);
    if (numberIndex == -1) {
        return number;
    }
    while (numberIndex != -1) {
        // console.log(numberIndex);

        numberExploded.splice(numberIndex, 1)
        console.log(numberExploded);

        numberIndex = numberExploded.indexOf(" ");
    }



    return number = numberExploded.join("");
}

function addTownResources(levelFarm, levelSawmill) {
    // console.log('function addTownFood');
    let townFood = document.getElementById('town-food').innerText;
    // townFood.replace(" ", "");
    townFood = transformFormatNumber(townFood);
    // console.log(townFood);
    townFood = parseFloat(townFood);
    // console.log(townFood);
    townFood = townFood + 1 + 5 * levelFarm;
    let townFoodInnerHTML = nf.format(townFood);
    townFoodInnerHTML = townFoodInnerHTML.replace(/[\s\uFEFF\xA0]/g, " ");
    document.getElementById('town-food').innerText = townFoodInnerHTML;

    let townWood = document.getElementById('town-wood').innerText;
    townWood = parseFloat(townWood);
    townWood = townWood + 1 + 4 * levelSawmill;
    let townWoodInnerHTML = nf.format(townWood);
    townWoodInnerHTML = townWoodInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-wood').innerText = townWoodInnerHTML;
    setTimeout(function () {
        addTownResources(levelFarm, levelSawmill)
    }, 10000);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');//.then(response => console.log(response.text()));
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
    // let url = 'http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood;
    // let oReq = new XMLHttpRequest();
    // oReq.open("GET", url, true);
    // console.log(townFood);
}

function addTownWood(level) {
    console.log('function addTownWood');
    let townWood = document.getElementById('town-wood').innerText;
    //console.log(townFood);
    townWood = transformFormatNumber(townWood);
    townWood = parseFloat(townWood);
    // console.log(townFood + 1);
    townWood = townWood + 1 + 4 * level;
    console.log(townWood);
    document.getElementById('town-wood').innerText = townWood;
    setTimeout(function () {
        addTownWood(level)
    }, 10000);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');//.then(response => console.log(response.text()));
    // let url = 'http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood;
    // let oReq = new XMLHttpRequest();
    // oReq.open("GET", url, true);
}

function addResources(levelFarm) {

    setTimeout(function () {
        addTownResources(levelFarm, levelSawmill);
        // addTownWood(levelSawmill);
        // handleResources(levelFarm, levelSawmill)
    }, 1000);
    // setInterval(setTimeout(function () {
    //     addTownWood(levelSawmill)
    // }, 1000));

}

function addTownWood(levelSawmill) {

    setTimeout(function () {
        // addTownFood(levelFarm);
        addTownWood(levelSawmill);
        // handleResources(levelFarm, levelSawmill)
    }, 1000);
    // setInterval(setTimeout(function () {
    //     addTownWood(levelSawmill)
    // }, 1000));

}

// function handleResources(levelFarm, levelSawmill) {
//     addTownFood(levelFarm);
//     // addTownWood(levelSawmill);
// }

// function refreshPage() {
//     setTimeout(refreshPage, 500000);
//     document.getElementById('form-save-resources').submit();
//     console.log('refresh');
// }

// function refresh() {
//     setInterval(setTimeout(refreshPage, 500000));
// }
// console.log(levelFarm);
// console.log(timeConstructFarm);
addResources(levelFarm, levelSawmill);
// console.log('après timeout');
// addTownWood(levelSawmill);
//setTimeout(addTownFood, 1000);
// refresh();