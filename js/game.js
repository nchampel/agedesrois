function displayPcclh() {
    document.getElementById('div-game-pcclh').style.display = 'block';
    document.getElementById('link-game-pcclh').style.display = 'none';
}
function notDisplayPcclh() {
    document.getElementById('div-game-pcclh').style.display = 'none';
    document.getElementById('link-game-pcclh').style.display = 'block';
}

if (document.getElementById('go-town') !== null) {
    let goTownElt = document.getElementById('go-town');
    goTownElt.addEventListener('click', function (e) {
        e.preventDefault();

        // qd je développe en local

        fetch('http://localhost:8080/LageDesRoisPOO/backend/changeView.php?view=town&id=' + idPlayer).then(() => {
            document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
        });

        // pour que cela fonctionne en ligne

        // fetch('https://agedesrois.alwaysdata.net/backend/changeView.php?view=town&id=' + idPlayer).then(() => {
        //     document.location.href = 'https://agedesrois.alwaysdata.net/frontend/map.php';
        // });
    });
}
if (document.getElementById('go-world') !== null) {
    let goTownElt = document.getElementById('go-world');
    goTownElt.addEventListener('click', function (e) {
        e.preventDefault();

        // qd je développe en local

        fetch('http://localhost:8080/LageDesRoisPOO/backend/changeView.php?view=world&id=' + idPlayer).then(() => {
            document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
        });

        // pour que cela fonctionne en ligne

        // fetch('https://agedesrois.alwaysdata.net/backend/changeView.php?view=world&id=' + idPlayer).then(() => {
        //     document.location.href = 'https://agedesrois.alwaysdata.net/frontend/map.php';
        // });
    });
}
if (document.getElementById('go-help') !== null) {
    let goHelpElt = document.getElementById('go-help');
    goHelpElt.addEventListener('click', function (e) {
        e.preventDefault();

        // qd je développe en local

        fetch('http://localhost:8080/LageDesRoisPOO/backend/changeView.php?view=help&id=' + idPlayer).then(() => {
            document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
        });

        // pour que cela fonctionne en ligne

        // fetch('https://agedesrois.alwaysdata.net/backend/changeView.php?view=help&id=' + idPlayer).then(() => {
        //     document.location.href = 'https://agedesrois.alwaysdata.net/frontend/map.php';
        // });
    });
}
