let waitingMessageElt = document.getElementById('flash-message');

// mettre tous les boutons
let idNames = ['castle', 'farm', 'sawmill', 'extractor', 'quarry', 'mine', 'workshop', 'barracks', 'archer', 'stock'];

// console.log(document.getElementById('transfer-food'));

// document.getElementById('transfer-food').innerText = 0;
// document.getElementById('transfer-wood').innerText = 0;
// document.getElementById('transfer-metal').innerText = 0;
// document.getElementById('transfer-stone').innerText = 0;
// document.getElementById('transfer-gold').innerText = 0;

idNames.forEach(function (name) {
    let idName = 'btn-' + name;
    if (document.getElementById(idName) !== null) {
        document.getElementById(idName).disabled = false;
    }

});

function construction(food, time) {

    // let level = document.getElementById('farm-level').innerText;
    // let townFood = document.getElementById('town-food').innerText;
    // console.log(level);
    // parseFloat(level);
    // parseFloat(townFood);
    // if (townFood - food >= 0) {
    //     townFood = townFood - food;
    //     document.getElementById('town-food').innerText = townFood;
    //     fetch('http://localhost:8080/LageDesRois/backend/constructSubstractResources.php?food=' + townFood);
    //     setTimeout(function () {
    //         fetch('http://localhost:8080/LageDesRois/backend/construct.php?type=farm&level=' + level);
    //         level++;
    //         document.getElementById('farm-level').innerText = level;
    //     }, time * 1000);
    // }
}

function saveResources() {
    // let pseudo = document.getElementById('pseudo').innerText;
    // console.log('function addTownFood');
    // let townFood = document.getElementById('town-food').innerText;
    // let townWood = document.getElementById('town-wood').innerText;
    // let townMetal = document.getElementById('town-metal').innerText;
    // let townStone = document.getElementById('town-stone').innerText;
    // let townGold = document.getElementById('town-gold').innerText;
    // let townBow = document.getElementById('town-bow').innerText;
    // let townCrossbow = document.getElementById('town-crossbow').innerText;

    //qd je d??veloppe en local

    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);//.then(response => console.log(response.text()));
    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);

    //pour que cela fonctionne en ligne

    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townFood + '&type=food&pseudo=' + pseudo);//.then(response => console.log(response.text()));
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townWood + '&type=wood&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townMetal + '&type=metal&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townStone + '&type=stone&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townGold + '&type=gold&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townBow + '&type=bow&pseudo=' + pseudo);
    // fetch('https://agedesrois.alwaysdata.net/backend/save.php?resource=' + townCrossbow + '&type=crossbow&pseudo=' + pseudo);

}
if (viewPage == 'town') {
    if (levelCastle <= levelFarm) {
        document.getElementById('btn-farm').disabled = true;
        document.getElementById('not-displayed-farm').style.display = 'block';
    }
    if (levelCastle <= levelSawmill) {
        document.getElementById('btn-sawmill').disabled = true;
        document.getElementById('not-displayed-sawmill').style.display = 'block';
    }
    if (levelCastle <= levelExtractor) {
        document.getElementById('btn-extractor').disabled = true;
        document.getElementById('not-displayed-extractor').style.display = 'block';
    }
    if (levelCastle <= levelQuarry) {
        document.getElementById('btn-quarry').disabled = true;
        document.getElementById('not-displayed-quarry').style.display = 'block';
    }
    if (levelCastle <= levelMine) {
        document.getElementById('btn-mine').disabled = true;
        document.getElementById('not-displayed-mine').style.display = 'block';
    }
    if (levelCastle <= levelBarracks) {
        document.getElementById('btn-barracks').disabled = true;
        document.getElementById('not-displayed-barracks').style.display = 'block';
    }

    if (levelCastle <= levelWorkshop) {
        document.getElementById('btn-workshop').disabled = true;
        document.getElementById('not-displayed-workshop').style.display = 'block';
    }

    if (levelBarracks <= levelArcher) {
        document.getElementById('btn-archer').disabled = true;
        document.getElementById('not-displayed-archer').style.display = 'block';
    }



    function waitingTimeConstruct(type) {
        let id = "";
        let name = "";
        // let isOK = false;
        let answer = "";
        let food = '';
        let wood = '';
        let metal = '';
        let stone = '';
        let gold = '';
        switch (type) {
            case 'castle':
                id = 'form-castle-construct';
                name = 'ch??teau lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction du ch??teau';
                // isOK = isConstructOKFarm;
                time = timeConstructCastle;
                food = castleFood;
                wood = castleWood;
                metal = castleMetal;
                stone = castleStone;
                gold = castleGold;
                break;
            case 'farm':
                id = 'form-farm-construct';
                name = 'ferme lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de la ferme';
                // isOK = isConstructOKFarm;
                time = timeConstructFarm;
                food = farmFood;
                wood = farmWood;
                metal = farmMetal;
                stone = farmStone;
                gold = farmGold;
                break;
            case 'sawmill':
                id = 'form-sawmill-construct';
                name = 'scierie lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de la scierie';
                // isOK = isConstructOKSawmill;
                time = timeConstructSawmill;
                food = sawmillFood;
                wood = sawmillWood;
                metal = sawmillMetal;
                stone = sawmillStone;
                gold = sawmillGold;
                break;
            case 'extractor':
                id = 'form-extractor-construct';
                name = 'extracteur lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de l\'extracteur';
                // isOK = isConstructOKExtractor;
                time = timeConstructExtractor;
                food = extractorFood;
                wood = extractorWood;
                metal = extractorMetal;
                stone = extractorStone;
                gold = extractorGold;
                break;
            case 'quarry':
                id = 'form-quarry-construct';
                name = 'carri??re lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de la carri??re';
                // isOK = isConstructOKQuarry;
                time = timeConstructQuarry;
                food = quarryFood;
                wood = quarryWood;
                metal = quarryMetal;
                stone = quarryStone;
                gold = quarryGold;
                break;
            case 'mine':
                id = 'form-mine-construct';
                name = 'mine lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de la mine';
                // isOK = isConstructOKMine;
                time = timeConstructMine;
                food = mineFood;
                wood = mineWood;
                metal = mineMetal;
                stone = mineStone;
                gold = mineGold;
                break;
            case 'barracks':
                id = 'form-barracks-construct';
                name = 'caserne lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de la caserne';
                // isOK = isConstructOKMine;
                time = timeConstructBarracks;
                food = barracksFood;
                wood = barracksWood;
                metal = barracksMetal;
                stone = barracksStone;
                gold = barracksGold;
                break;
        }
        let formElt = document.getElementById(id);
        // console.log(formElt);
        formElt.addEventListener("submit", function (e) {
            e.preventDefault();
            // fetch('http://localhost:8080/LageDesRois/backend/connexion.php');
            // console.log(formElt);
            let townFoodUpdate = document.getElementById('town-food').innerText;
            // console.log(townFoodUpdate);
            townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
            let townWoodUpdate = parseFloat(transformFormatNumber(document.getElementById('town-wood').innerText));
            // console.log(townWoodUpdate);
            let townMetalUpdate = parseFloat(transformFormatNumber(document.getElementById('town-metal').innerText));
            let townStoneUpdate = parseFloat(transformFormatNumber(document.getElementById('town-stone').innerText));
            let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
            // console.log(townFoodUpdate);
            // console.log(food);
            if (townFoodUpdate >= food && townWoodUpdate >= wood && townMetalUpdate >= metal && townStoneUpdate >= stone && townGoldUpdate >= gold) {
                // if (isOK) {
                waitingMessageElt.innerText = 'Construction ' + name;
                idNames.forEach(function (name) {
                    let idName = 'btn-' + name;
                    document.getElementById(idName).disabled = true;
                });
                timedProgBar(time);
                setTimeout(function () {
                    // console.log('event settimeout ferme');
                    // let townFood = document.getElementById('town-food').innerText;
                    // let townWood = document.getElementById('town-wood').innerText;
                    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                    // saveResources(); //marche pas

                    formElt.submit();
                }, time * 1000 + 2000);
            } else {
                // console.log('bug');
                waitingMessageElt.innerText = answer;
            }
        });
    }

    function waitingTimeConstructStock(type) {
        let id = "";
        let name = "";
        let isOK = false;
        let answer = "";
        let food = '';
        let wood = '';
        let metal = '';
        let stone = '';
        let gold = '';

        switch (type) {
            case 'workshop':
                id = 'form-workshop-construct';
                name = 'atelier lanc??e';
                answer = 'Pas assez de ressources pour lancer la construction de l\'atelier';
                // isOK = isConstructOKWorkshop;
                time = timeConstructWorkshop;
                food = workshopFood;
                wood = workshopWood;
                metal = workshopMetal;
                stone = workshopStone;
                gold = workshopGold;
                break;
        }
        let formElt = document.getElementById(id);
        // console.log(formElt);
        formElt.addEventListener("submit", function (e) {
            e.preventDefault();
            // fetch('http://localhost:8080/LageDesRois/backend/connexion.php');
            let stockFoodUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-food').innerText));
            let stockWoodUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-wood').innerText));
            let stockMetalUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-metal').innerText));
            let stockStoneUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-stone').innerText));
            let stockGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('stock-gold').innerText));
            // console.log(stockFoodUpdate);
            if (stockFoodUpdate >= food && stockWoodUpdate >= wood && stockMetalUpdate >= metal && stockStoneUpdate >= stone && stockGoldUpdate >= gold) {
                // if (isOK) {
                waitingMessageElt.innerText = 'Construction ' + name;
                idNames.forEach(function (name) {
                    let idName = 'btn-' + name;
                    document.getElementById(idName).disabled = true;
                });
                timedProgBar(time);
                setTimeout(function () {
                    // console.log('event settimeout ferme');
                    // let townFood = document.getElementById('town-food').innerText;
                    // let townWood = document.getElementById('town-wood').innerText;
                    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                    // saveResources(); //marche pas

                    formElt.submit();
                }, time * 1000 + 2000);
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
        let food = '';
        let gold = '';
        let bow = 0;
        let crossbow = 0;

        switch (type) {
            case 'archer':
                id = 'form-archer-training';
                name = 'archer lanc??e';
                answer = 'Pas assez de ressources pour lancer l\'am??lioration de l\'archer';
                // isOK = isTrainingOKArcher;
                time = timeTrainingArcher;
                food = archerFood;
                gold = archerGold;
                bow = archerBow;
                // crossbow = archerCrossbow;
                break;
        }
        let formElt = document.getElementById(id);
        formElt.addEventListener("submit", function (e) {
            e.preventDefault();
            let townFoodUpdate = document.getElementById('town-food').innerText;
            townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
            let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
            let townBowUpdate = parseFloat(transformFormatNumber(document.getElementById('town-bow').innerText));
            if (townFoodUpdate >= food && townGoldUpdate >= gold && townBowUpdate >= bow) {
                // if (isOK) {
                waitingMessageElt.innerText = 'Am??lioration ' + name;
                idNames.forEach(function (name) {
                    let idName = 'btn-' + name;
                    document.getElementById(idName).disabled = true;
                });
                timedProgBar(time);
                setTimeout(function () {
                    // console.log('event settimeout ferme');
                    // let townFood = document.getElementById('town-food').innerText;
                    // let townWood = document.getElementById('town-wood').innerText;
                    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townFood + '&type=food');
                    // fetch('http://localhost:8080/LageDesRois/backend/save.php?resource=' + townWood + '&type=wood');
                    // saveResources();
                    formElt.submit();
                }, time * 1000 + 2000);
            } else {
                waitingMessageElt.innerText = answer;
            }
        });
    }

    let typesTown = ['farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks', 'castle'];
    typesTown.forEach(function (type) {
        waitingTimeConstruct(type);
    });

    let typesStock = ['workshop'];
    typesStock.forEach(function (type) {
        waitingTimeConstructStock(type);
    });

    let trainingTypes = ['archer'];
    trainingTypes.forEach(function (trainingType) {
        waitingTimeTraining(trainingType);
    });

    // temps d'attente mise en stock
    let stockFormElt = document.getElementById('form-stock');

    // console.log(stockFormElt);
    stockFormElt.addEventListener("submit", function (e) {
        let townFoodUpdate = document.getElementById('town-food').innerText;
        // console.log(townFoodUpdate);
        townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
        let townWoodUpdate = parseFloat(transformFormatNumber(document.getElementById('town-wood').innerText));
        // console.log(townWoodUpdate);
        let townMetalUpdate = parseFloat(transformFormatNumber(document.getElementById('town-metal').innerText));
        let townStoneUpdate = parseFloat(transformFormatNumber(document.getElementById('town-stone').innerText));
        let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
        let foodToStock = document.getElementById('transfer-food').value;
        let woodToStock = document.getElementById('transfer-wood').value;
        let metalToStock = document.getElementById('transfer-metal').value;
        let stoneToStock = document.getElementById('transfer-stone').value;
        let goldToStock = document.getElementById('transfer-gold').value;
        if (townFoodUpdate >= parseInt(foodToStock) &&
            townWoodUpdate >= parseInt(woodToStock) &&
            townMetalUpdate >= parseInt(metalToStock) &&
            townStoneUpdate >= parseInt(stoneToStock) &&
            townGoldUpdate >= parseInt(goldToStock)
        ) {
            isStockResourcesOK = true;
        } else {
            isStockResourcesOK = false;
        }
        // console.log('event stockage');
        // console.log(metalToStock);
        e.preventDefault();
        if (isStockResourcesOK) {
            waitingMessageElt.innerText = 'Stockage en cours';
            idNames.forEach(function (name) {
                let idName = 'btn-' + name;
                document.getElementById(idName).disabled = true;
            });
            timedProgBar(10);
            setTimeout(function () {
                // saveResources();
                stockFormElt.submit();
                // document.getElementById('form-save-resources').submit();
            }, 10000 + 4000);
        } else {
            waitingMessageElt.innerText = 'Pas assez de ressources ?? stocker';
        }


    });
}

// qd je d??veloppe en local

let url = 'http://localhost:8080/LageDesRoisPOO/';

// pour que cela fonctionne en ligne

// let url = 'https://agedesrois.alwaysdata.net/';

// g??re l'ajout des ressources ?? partir de la carte
let itemResourceElts = document.getElementsByClassName('class-resource');
let itemProductElts = document.getElementsByClassName('class-product');
let itemObjectElts = document.getElementsByClassName('class-object');
// console.log(itemResourceElts);
Array.from(itemResourceElts).forEach(function (itemResourceElt) {
    itemResourceElt.addEventListener('click', function (e) {
        let typeResource = itemResourceElt.getAttribute('data-type-resource');
        let position = itemResourceElt.getAttribute('data-position');
        let isActive = itemResourceElt.getAttribute('data-is-active');
        // console.log(typeResource);
        if (isActive == '1') {
            switch (typeResource) {
                case 'nourriture':
                    waitingMessageElt.innerText = 'R??cup??ration de la nourriture en cours';
                    break;
                case 'bois':
                    waitingMessageElt.innerText = 'R??cup??ration du bois en cours';
                    break;
                case 'metal':
                    waitingMessageElt.innerText = 'R??cup??ration du m??tal en cours';
                    break;
                case 'pierre':
                    waitingMessageElt.innerText = 'R??cup??ration de la pierre en cours';
                    break;
            }
            ///////////// //ne pas oublier de d??sactiver les monstres aussi
            Array.from(itemResourceElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });
            Array.from(itemProductElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });

            timedProgBar(20);
            setTimeout(function () {
                // saveResources();
                e.preventDefault();

                // qd je d??veloppe en local

                // fetch('http://localhost:8080/LageDesRoisPOO/backend/addingMapResources.php?id=' + idPlayer + '&position=' + position).then(() => {
                //     document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
                // });

                fetch(url + 'backend/addingMapResources.php?id=' + idPlayer + '&position=' + position).then(() => {
                    document.location.href = url + 'frontend/map.php';
                });

                // pour que cela fonctionne en ligne

                // fetch('https://agedesrois.alwaysdata.net/backend/addingMapResources.php?id=' + idPlayer + '&position=' + position).then(() => {
                //     document.location.href = 'https://agedesrois.alwaysdata.net/frontend/map.php';
                // });

                // document.getElementById('form-save-resources').submit();
            }, 20000 + 4000);
        }


        // document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
        // console.log();
    });

});

// g??re l'ajout des produits (herbes, minerai, arbre) ?? partir de la carte

// console.log(itemProductElts);
Array.from(itemProductElts).forEach(function (itemProductElt) {
    itemProductElt.addEventListener('click', function (e) {
        let typeProduct = itemProductElt.getAttribute('data-type-product');
        let position = itemProductElt.getAttribute('data-position');
        let isActive = itemProductElt.getAttribute('data-is-active');
        // console.log(typeResource);
        if (isActive == '1') {
            switch (typeProduct) {
                case 'herbes':
                    waitingMessageElt.innerText = 'Cueillette en cours';
                    break;
                case 'arbre':
                    waitingMessageElt.innerText = 'Abattage en cours';
                    break;
                case 'minerai':
                    waitingMessageElt.innerText = 'Minage en cours';
                    break;
            }
            ///////////// //ne pas oublier de d??sactiver les monstres aussi
            Array.from(itemResourceElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });
            Array.from(itemProductElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });

            timedProgBar(10);
            setTimeout(function () {
                // saveResources();
                e.preventDefault();

                // qd je d??veloppe en local

                fetch(url + 'backend/addingMapProducts.php?id=' + idPlayer + '&position=' + position).then(() => {
                    document.location.href = url + 'frontend/map.php';
                });

                // pour que cela fonctionne en ligne

                // fetch('https://agedesrois.alwaysdata.net/backend/addingMapProducts.php?id=' + idPlayer + '&position=' + position).then(() => {
                //     document.location.href = 'https://agedesrois.alwaysdata.net/frontend/map.php';
                // });


                // document.getElementById('form-save-resources').submit();
            }, 10000 + 2000);
        }


        // document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
        // console.log();
    });

});

// g??re l'ajout des objets d'??v??nement (buisson/houx) ?? partir de la carte

// console.log(itemProductElts);
Array.from(itemObjectElts).forEach(function (itemObjectElt) {
    itemObjectElt.addEventListener('click', function (e) {
        let typeObject = itemObjectElt.getAttribute('data-type-object');
        let position = itemObjectElt.getAttribute('data-position');
        let isActive = itemObjectElt.getAttribute('data-is-active');
        // console.log(typeResource);
        if (isActive == '1') {
            switch (typeObject) {
                case 'buisson':
                    waitingMessageElt.innerText = 'Recherche de houx dans le buisson';
                    break;
            }
            ///////////// //ne pas oublier de d??sactiver les monstres aussi
            Array.from(itemResourceElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });
            Array.from(itemProductElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });
            Array.from(itemObjectElts).forEach(function (item) {
                item.setAttribute('data-is-active', '0');
            });

            timedProgBar(10);
            setTimeout(function () {
                // saveResources();
                e.preventDefault();

                // qd je d??veloppe en local

                fetch(url + 'backend/addingMapObjects.php?id=' + idPlayer + '&position=' + position).then(() => {
                    document.location.href = url + 'frontend/map.php';
                });

                // pour que cela fonctionne en ligne

                // fetch('https://agedesrois.alwaysdata.net/backend/addingMapObjects.php?id=' + idPlayer + '&position=' + position).then(() => {
                //     document.location.href = 'https://agedesrois.alwaysdata.net/frontend/map.php';
                // });


                // document.getElementById('form-save-resources').submit();
            }, 10000 + 2000);
        }


        // document.location.href = 'http://localhost:8080/LageDesRoisPOO/frontend/map.php';
        // console.log();
    });

});

// formElt.addEventListener("submit", function (e) {
//     e.preventDefault();
//     let townFoodUpdate = document.getElementById('town-food').innerText;
//     townFoodUpdate = parseFloat(transformFormatNumber(townFoodUpdate));
//     let townGoldUpdate = parseFloat(transformFormatNumber(document.getElementById('town-gold').innerText));
//     let townBowUpdate = parseFloat(transformFormatNumber(document.getElementById('town-bow').innerText));
//     if (townFoodUpdate >= food && townGoldUpdate >= gold && townBowUpdate >= bow) {
//         waitingMessageElt.innerText = 'Am??lioration ' + name;
//         idNames.forEach(function (name) {
//             let idName = 'btn-' + name;
//             document.getElementById(idName).disabled = true;
//         });
//         timedProgBar(time);
//         setTimeout(function () {
//             formElt.submit();
//         }, time * 1000 + 2000);
//     } else {
//         waitingMessageElt.innerText = answer;
//     }
// });