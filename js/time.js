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

    // pour faire la coloration en temps réel des tooltip

    if (townFood >= farmFood) {
        let id = 'tooltip-food-farm';
        document.getElementById(id).style.color = '#4cff49';
    }
    if (townWood >= farmWood) {
        let id = 'tooltip-wood-farm';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }

    }
    if (townMetal >= farmMetal) {
        let id = 'tooltip-metal-farm';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townStone >= farmStone) {
        let id = 'tooltip-stone-farm';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townGold >= farmGold) {
        let id = 'tooltip-gold-farm';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }

    if (townFood >= sawmillFood) {
        let id = 'tooltip-food-sawmill';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townWood >= sawmillWood) {
        let id = 'tooltip-wood-sawmill';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townMetal >= sawmillMetal) {
        let id = 'tooltip-metal-sawmill';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townStone >= sawmillStone) {
        let id = 'tooltip-stone-sawmill';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townGold >= sawmillGold) {
        let id = 'tooltip-gold-sawmill';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }

    if (townFood >= extractorFood) {
        let id = 'tooltip-food-extractor';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townWood >= extractorWood) {
        let id = 'tooltip-wood-extractor';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townMetal >= extractorMetal) {
        let id = 'tooltip-metal-extractor';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townStone >= extractorStone) {
        let id = 'tooltip-stone-extractor';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townGold >= extractorGold) {
        let id = 'tooltip-gold-extractor';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }

    if (townFood >= quarryFood) {
        let id = 'tooltip-food-quarry';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townWood >= quarryWood) {
        let id = 'tooltip-wood-quarry';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townMetal >= quarryMetal) {
        let id = 'tooltip-metal-quarry';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townStone >= quarryStone) {
        let id = 'tooltip-stone-quarry';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townGold >= quarryGold) {
        let id = 'tooltip-gold-quarry';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }

    if (townFood >= mineFood) {
        let id = 'tooltip-food-mine';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townWood >= mineWood) {
        let id = 'tooltip-wood-mine';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townMetal >= mineMetal) {
        let id = 'tooltip-metal-mine';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townStone >= mineStone) {
        let id = 'tooltip-stone-mine';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townGold >= mineGold) {
        let id = 'tooltip-gold-mine';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }

    if (townFood >= barracksFood) {
        let id = 'tooltip-food-barracks';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townWood >= barracksWood) {
        let id = 'tooltip-wood-barracks';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townMetal >= barracksMetal) {
        let id = 'tooltip-metal-barracks';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townStone >= barracksStone) {
        let id = 'tooltip-stone-barracks';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }
    if (townGold >= barracksGold) {
        let id = 'tooltip-gold-barracks';
        if (document.getElementById(id) !== null) {
            document.getElementById(id).style.color = '#4cff49';
        }
    }

    setTimeout(function () {
        addTownResources()
    }, 10000);

    //qd je développe en local

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

    //pour que cela fonctionne en ligne

    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);


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