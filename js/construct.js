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

let constructFarmFormElt = document.getElementById('form-farm-construct');
console.log(timeConstructFarm);
constructFarmFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    setTimeout(function () {
        constructFarmFormElt.submit();
    }, timeConstructFarm * 1000);
});

let constructSawmillFormElt = document.getElementById('form-sawmill-construct');
console.log('event scierie');
constructSawmillFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    setTimeout(function () {
        constructSawmillFormElt.submit();
    }, timeConstructSawmill * 1000);
});
