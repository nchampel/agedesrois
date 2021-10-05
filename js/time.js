let nf = Intl.NumberFormat("fr-FR", true);

function transformFormatNumber(number) {
    let numberExploded = number.split("");
    let numberIndex = numberExploded.indexOf(" ");
    if (numberIndex == -1) {
        return number;
    }
    while (numberIndex != -1) {
        numberExploded.splice(numberIndex, 1)
        numberIndex = numberExploded.indexOf(" ");
    }
    return number = numberExploded.join("");
}

function addTownResources() {
    let pseudo = document.getElementById('pseudo').innerText;
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
    townWood = transformFormatNumber(townWood);
    townWood = parseFloat(townWood);
    townWood = townWood + 1 + 4 * levelSawmill;
    let townWoodInnerHTML = nf.format(townWood);
    townWoodInnerHTML = townWoodInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-wood').innerText = townWoodInnerHTML;

    let townMetal = document.getElementById('town-metal').innerText;
    townMetal = transformFormatNumber(townMetal);
    townMetal = parseFloat(townMetal);
    townMetal = townMetal + 3 * levelExtractor;
    let townMetalInnerHTML = nf.format(townMetal);
    townMetalInnerHTML = townMetalInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-metal').innerText = townMetalInnerHTML;

    let townStone = document.getElementById('town-stone').innerText;
    townStone = transformFormatNumber(townStone);
    townStone = parseFloat(townStone);
    townStone = townStone + 2 * levelQuarry;
    let townStoneInnerHTML = nf.format(townStone);
    townStoneInnerHTML = townStoneInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-stone').innerText = townStoneInnerHTML;

    let townGold = document.getElementById('town-gold').innerText;
    townGold = transformFormatNumber(townGold);
    townGold = parseFloat(townGold);
    townGold = townGold + 1 * levelMine;
    let townGoldInnerHTML = nf.format(townGold);
    townGoldInnerHTML = townGoldInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-gold').innerText = townGoldInnerHTML;

    let townBow = document.getElementById('town-bow').innerText;
    // console.log('bow');
    townBow = transformFormatNumber(townBow);
    townBow = parseFloat(townBow);
    townBow = townBow + 1 * levelWorkshop;
    let townBowInnerHTML = nf.format(townBow);
    townBowInnerHTML = townBowInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-bow').innerText = townBowInnerHTML;

    let townCrossbow = document.getElementById('town-crossbow').innerText;
    townCrossbow = transformFormatNumber(townCrossbow);
    townCrossbow = parseFloat(townCrossbow);
    townCrossbow = townCrossbow + 1 * levelWorkshop;
    let townCrossbowInnerHTML = nf.format(townCrossbow);
    townCrossbowInnerHTML = townCrossbowInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-crossbow').innerText = townCrossbowInnerHTML;

    setTimeout(function () {
        addTownResources()
    }, 10000);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);//.then(response => console.log(response.text()));
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);
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

function addResources() {

    setTimeout(function () {
        addTownResources();
        // addTownWood(levelSawmill);
        // handleResources(levelFarm, levelSawmill)
    }, 10000);
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
addResources();
// console.log('après timeout');
// addTownWood(levelSawmill);
//setTimeout(addTownFood, 1000);
// refresh();