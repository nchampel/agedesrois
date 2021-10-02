function addTownFood(level) {
    console.log('function addTownFood');
    let townFood = document.getElementById('town-food').innerText;
    //console.log(townFood);
    townFood = parseFloat(townFood);
    // console.log(townFood + 1);
    townFood = townFood + 1 + 2 * level;
    document.getElementById('town-food').innerText = townFood;
    setTimeout(function () {
        addTownFood(level)
    }, 10000);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood);//.then(response => console.log(response.text()));
    // let url = 'http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood;
    // let oReq = new XMLHttpRequest();
    // oReq.open("GET", url, true);
}

function addTownWood(level) {
    console.log('function addTownWood');
    let townWood = document.getElementById('town-wood').innerText;
    //console.log(townFood);
    townWood = parseFloat(townWood);
    // console.log(townFood + 1);
    townWood = townWood + 1 + 2 * level;
    document.getElementById('town-food').innerText = townWood;
    setTimeout(function () {
        addTownWood(level)
    }, 10000);
    fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood);//.then(response => console.log(response.text()));
    // let url = 'http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood;
    // let oReq = new XMLHttpRequest();
    // oReq.open("GET", url, true);
}

function addResources(levelFarm, levelSawmill) {

    setInterval(setTimeout(function () {
        addTownFood(levelFarm)
    }, 1000));
    setInterval(setTimeout(function () {
        addTownWood(levelSawmill)
    }, 1000));

}

function refreshPage() {
    setTimeout(refreshPage, 500000);
    document.getElementById('save-resources').submit();
    console.log('refresh');
}

function refresh() {
    setInterval(setTimeout(refreshPage, 500000));
}
// console.log(levelFarm);
// console.log(timeConstructFarm);
addResources(levelFarm, levelSawmill);
//setTimeout(addTownFood, 1000);
// refresh();