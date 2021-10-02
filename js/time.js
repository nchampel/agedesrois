function addTownResources(levelFarm, levelSawmill) {
    // console.log('function addTownFood');
    let townFood = document.getElementById('town-food').innerText;
    townFood = parseFloat(townFood);
    townFood = townFood + 1 + 5 * levelFarm;
    document.getElementById('town-food').innerText = townFood;

    let townWood = document.getElementById('town-wood').innerText;
    townWood = parseFloat(townWood);
    townWood = townWood + 1 + 4 * levelSawmill;
    document.getElementById('town-wood').innerText = townWood;
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
//     document.getElementById('save-resources').submit();
//     console.log('refresh');
// }

// function refresh() {
//     setInterval(setTimeout(refreshPage, 500000));
// }
// console.log(levelFarm);
// console.log(timeConstructFarm);
addResources(levelFarm, levelSawmill);
console.log('après timeout');
// addTownWood(levelSawmill);
//setTimeout(addTownFood, 1000);
// refresh();