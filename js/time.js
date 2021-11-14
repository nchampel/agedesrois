let nf = Intl.NumberFormat("fr-FR", true);
let townFood = ''; let townWood = ''; let townMetal = ''; let townStone = ''; let townGold = ''; let townBow = ''; let townCrossbow = ''; let id = '';

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
    // let pseudo = document.getElementById('pseudo').innerText;
    // console.log('function addTownFood');
    townFood = document.getElementById('town-food').innerText;
    // townFood.replace(" ", "");
    townFood = transformFormatNumber(townFood);
    // console.log(townFood);
    townFood = parseFloat(townFood);
    // console.log(townFood);
    townFood = townFood + 1 + 5 * levelFarm;
    let townFoodInnerHTML = nf.format(townFood);
    townFoodInnerHTML = townFoodInnerHTML.replace(/[\s\uFEFF\xA0]/g, " ");
    document.getElementById('town-food').innerText = townFoodInnerHTML;

    townWood = document.getElementById('town-wood').innerText;
    townWood = transformFormatNumber(townWood);
    townWood = parseFloat(townWood);
    townWood = townWood + 1 + 4 * levelSawmill;
    let townWoodInnerHTML = nf.format(townWood);
    townWoodInnerHTML = townWoodInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-wood').innerText = townWoodInnerHTML;
    // console.log(townWood);

    townMetal = document.getElementById('town-metal').innerText;
    townMetal = transformFormatNumber(townMetal);
    townMetal = parseFloat(townMetal);
    townMetal = townMetal + 3 * levelExtractor;
    let townMetalInnerHTML = nf.format(townMetal);
    townMetalInnerHTML = townMetalInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-metal').innerText = townMetalInnerHTML;

    townStone = document.getElementById('town-stone').innerText;
    townStone = transformFormatNumber(townStone);
    townStone = parseFloat(townStone);
    townStone = townStone + 2 * levelQuarry;
    let townStoneInnerHTML = nf.format(townStone);
    townStoneInnerHTML = townStoneInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-stone').innerText = townStoneInnerHTML;

    townGold = document.getElementById('town-gold').innerText;
    townGold = transformFormatNumber(townGold);
    townGold = parseFloat(townGold);
    townGold = townGold + 1 * levelMine;
    let townGoldInnerHTML = nf.format(townGold);
    townGoldInnerHTML = townGoldInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-gold').innerText = townGoldInnerHTML;

    townBow = document.getElementById('town-bow').innerText;
    // console.log('bow');
    townBow = transformFormatNumber(townBow);
    townBow = parseFloat(townBow);
    townBow = townBow + 1 * levelWorkshop;
    let townBowInnerHTML = nf.format(townBow);
    townBowInnerHTML = townBowInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-bow').innerText = townBowInnerHTML;

    townCrossbow = document.getElementById('town-crossbow').innerText;
    // console.log(townCrossbow);
    townCrossbow = transformFormatNumber(townCrossbow);
    townCrossbow = parseFloat(townCrossbow);
    townCrossbow = townCrossbow + 1 * levelWorkshop;
    let townCrossbowInnerHTML = nf.format(townCrossbow);
    townCrossbowInnerHTML = townCrossbowInnerHTML.replace(/[\s\uFEFF\xA0]/g, " "); //remplace le faux espace du formatage
    document.getElementById('town-crossbow').innerText = townCrossbowInnerHTML;

    // pour faire la coloration en temps réel des tooltip
    let townConstructs = ['farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks'];
    // console.log(new ((function () { return 'test' }).Constructor));
    townConstructs.forEach(function (townConstruct) {
        // const name = townConstruct.charAt(0).toUpperCase() + townConstruct.slice(1);
        // const foodResource = new Function('name', 'return name + "Food"');
        // const foodResource = function food(name) {
        //     let variableName = name + "Food";
        //     return window[variableName];
        // }
        // const woodResource = new Function('name', 'return name + "Wood"');
        // const metalResource = new Function('name', 'return name + "Metal"');
        // const stoneResource = new Function('name', 'return name + "Stone"');
        // const goldResource = new Function('name', 'return name + "Gold"');
        // console.log(foodResource(townConstruct));
        // if (townFood >= foodResource(townConstruct)) {
        if (viewPage == "town") {
            if (townFood >= eval(townConstruct + "Food")) {
                id = 'tooltip-food-' + townConstruct;
                document.getElementById(id).style.color = '#4cff49';
            }
            // if (townWood >= woodResource(townConstruct)) {
            if (townWood >= eval(townConstruct + "Wood")) {
                id = 'tooltip-wood-' + townConstruct;
                if (document.getElementById(id) !== null) {
                    document.getElementById(id).style.color = '#4cff49';
                }

            }
            // if (townMetal >= metalResource(townConstruct)) {
            if (townMetal >= eval(townConstruct + "Metal")) {
                id = 'tooltip-metal-' + townConstruct;
                if (document.getElementById(id) !== null) {
                    document.getElementById(id).style.color = '#4cff49';
                }
            }
            // if (townStone >= stoneResource(townConstruct)) {
            if (townStone >= eval(townConstruct + "Stone")) {
                id = 'tooltip-stone-' + townConstruct;
                if (document.getElementById(id) !== null) {
                    document.getElementById(id).style.color = '#4cff49';
                }
            }
            // if (townGold >= goldResource(townConstruct)) {
            if (townGold >= eval(townConstruct + "Gold")) {
                id = 'tooltip-gold-' + townConstruct;
                if (document.getElementById(id) !== null) {
                    document.getElementById(id).style.color = '#4cff49';
                }
            }
        }

    });

    let trainings = ['archer'/*, 'crossbowman'*/];
    // console.log(new ((function () { return 'test' }).Constructor));
    trainings.forEach(function (training) {
        if (viewPage != "world") {
            if (townFood >= eval(training + "Food")) {
                id = 'tooltip-food-' + training;
                document.getElementById(id).style.color = '#4cff49';
            }
            // if (townWood >= woodResource(townConstruct)) {
            if (townGold >= eval(training + "Gold")) {
                id = 'tooltip-gold-' + training;
                if (document.getElementById(id) !== null) {
                    document.getElementById(id).style.color = '#4cff49';
                }

            }
            // if (townMetal >= metalResource(townConstruct)) {
            if (townBow >= eval(training + "Bow")) {
                id = 'tooltip-bow-' + training;
                if (document.getElementById(id) !== null) {
                    document.getElementById(id).style.color = '#4cff49';
                }
            }
        }
    });

    // console.log(foodResource('farm'));
    // if (townFood >= farmFood) {
    //     id = 'tooltip-food-farm';
    //     document.getElementById(id).style.color = '#4cff49';
    // }
    // if (townWood >= farmWood) {
    //     id = 'tooltip-wood-farm';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }

    // }
    // if (townMetal >= farmMetal) {
    //     id = 'tooltip-metal-farm';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townStone >= farmStone) {
    //     id = 'tooltip-stone-farm';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townGold >= farmGold) {
    //     id = 'tooltip-gold-farm';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }

    // if (townFood >= sawmillFood) {
    //     id = 'tooltip-food-sawmill';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townWood >= sawmillWood) {
    //     id = 'tooltip-wood-sawmill';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townMetal >= sawmillMetal) {
    //     id = 'tooltip-metal-sawmill';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townStone >= sawmillStone) {
    //     id = 'tooltip-stone-sawmill';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townGold >= sawmillGold) {
    //     id = 'tooltip-gold-sawmill';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }

    // if (townFood >= extractorFood) {
    //     id = 'tooltip-food-extractor';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townWood >= extractorWood) {
    //     id = 'tooltip-wood-extractor';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townMetal >= extractorMetal) {
    //     id = 'tooltip-metal-extractor';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townStone >= extractorStone) {
    //     id = 'tooltip-stone-extractor';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townGold >= extractorGold) {
    //     id = 'tooltip-gold-extractor';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }

    // if (townFood >= quarryFood) {
    //     id = 'tooltip-food-quarry';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townWood >= quarryWood) {
    //     id = 'tooltip-wood-quarry';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townMetal >= quarryMetal) {
    //     id = 'tooltip-metal-quarry';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townStone >= quarryStone) {
    //     id = 'tooltip-stone-quarry';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townGold >= quarryGold) {
    //     id = 'tooltip-gold-quarry';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }

    // if (townFood >= mineFood) {
    //     id = 'tooltip-food-mine';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townWood >= mineWood) {
    //     id = 'tooltip-wood-mine';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townMetal >= mineMetal) {
    //     id = 'tooltip-metal-mine';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townStone >= mineStone) {
    //     id = 'tooltip-stone-mine';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townGold >= mineGold) {
    //     id = 'tooltip-gold-mine';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }

    // if (townFood >= barracksFood) {
    //     id = 'tooltip-food-barracks';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townWood >= barracksWood) {
    //     id = 'tooltip-wood-barracks';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townMetal >= barracksMetal) {
    //     id = 'tooltip-metal-barracks';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townStone >= barracksStone) {
    //     id = 'tooltip-stone-barracks';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }
    // if (townGold >= barracksGold) {
    //     id = 'tooltip-gold-barracks';
    //     if (document.getElementById(id) !== null) {
    //         document.getElementById(id).style.color = '#4cff49';
    //     }
    // }



    //qd je développe en local

    fetch('http://localhost:8080/LageDesRoisPOO/backend/countTime.php?id=' + idPlayer);
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townFood + '&type=food&building=farm&id=' + idPlayer);//.then(response => console.log(response.text()));
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townWood + '&type=wood&building=sawmill&id=' + idPlayer);
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townMetal + '&type=metal&building=extractor&id=' + idPlayer);
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townStone + '&type=stone&building=quarry&id=' + idPlayer);
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townGold + '&type=gold&building=mine&id=' + idPlayer);
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townBow + '&type=bow&building=workshop&id=' + idPlayer);
    fetch('http://localhost:8080/LageDesRoisPOO/backend/save.php?resource=' + townCrossbow + '&type=crossbow&building=workshop&id=' + idPlayer);

    // let url = 'http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood;
    // let oReq = new XMLHttpRequest();
    // oReq.open("GET", url, true);
    // console.log(townFood);

    //pour que cela fonctionne en ligne

    // fetch('https://agedesrois.alwaysdata.net/backend/countTime.php?id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townFood + '&type=food&building=farm&id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townWood + '&type=wood&building=sawmill&id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townMetal + '&type=metal&building=extractor&id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townStone + '&type=stone&building=quarry&id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townGold + '&type=gold&building=mine&id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townBow + '&type=bow&building=workshop&id=' + idPlayer);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townCrossbow + '&type=crossbow&building=workshop&id=' + idPlayer);

    setTimeout(function () {
        addTownResources()
    }, 10000);
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