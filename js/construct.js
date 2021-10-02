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

let constructBtnElt = document.getElementById('btn-farm-construct');
let constructFormElt = document.getElementById('form-farm-construct');
console.log(timeConstructFarm);
constructFormElt.addEventListener("submit", function (e) {
    e.preventDefault();
    setTimeout(function () {
        constructFormElt.submit();
    }, timeConstructFarm * 1000);
});
