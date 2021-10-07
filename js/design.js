console.log('design');
// let elem = document.getElementById("progress-bar");
// let theCSSprop = window.getComputedStyle(elem, null).getPropertyValue("background");
// // document.getElementById("demo").innerHTML = theCSSprop;
// console.log(theCSSprop);
// let elem = document.getElementById("test");
// let theCSSprop = window.getComputedStyle(elem, null).getPropertyValue("color");
// // document.getElementById("demo").innerHTML = theCSSprop;
// console.log(theCSSprop);
let containerElt = document.getElementById("div-progress-bar");
let progressBarElt = document.getElementById("progress-bar");
let colorProgressBar = window.getComputedStyle(progressBarElt, null).getPropertyValue("background-color");
console.log(colorProgressBar);
progressBarElt.style.backgroundColor = "#FFDC00";

let i = 0;
let colorsProgressBar = ["#FF0800", "#FF1500", "#FF2200", "#FF2E00", "#FF2E00", "#FF4800", "#FF5500", "#FF6100", "#FF6E00", "#FF7B00", "#FF8800",
    "#FF9400", "#FFA100", "#FFAA00", "#FFB600", "#FFC300", "#FFD000", "#FFDC00", "#FFE900", "#FFF600", "#FAFF00", "#EEFF00", "#E1FF00", "#D4FF00",
    "#C7FF00", "#BBFF00", "#AEFF00", "#A5FF00", "#98FF00", "#8CFF00", "#7FFF00", "#72FF00", "#65FF00", "#59FF00", "#4CFF00", "#3FFF00", "#32FF00",
    "#26FF00", "#19FF00"];
let numberColors = colorsProgressBar.length;


function timedProgBar(time) {
    containerElt.style.display = "block";
    progressBarElt.style.display = "block";
    console.log(parseInt(i * 300 / time));
    if (i <= time) {

        progressBarElt.style.width = parseInt(i * 300 / time) + "px";
        progressBarElt.style.backgroundColor = colorsProgressBar[parseInt(i * numberColors / time)];
        console.log(i * numberColors / time);
        setTimeout(function () {
            timedProgBar(time);
        }, 1000);
        i++;
    }
}

// timedProgBar(60);

// 1000px
// 4s
// 250, 500 750 1000



/*
#FF0800
#FF1500
#FF2200
#FF2E00
#FF2E00
#FF4800
#FF5500
#FF6100
#FF6E00
#FF7B00
#FF8800
#FF9400
#FFA100
#FFAA00
#FFB600
#FFC300
#FFD000
#FFDC00
#FFE900
#FFF600
#FAFF00
#EEFF00
#E1FF00
#D4FF00
#C7FF00
#BBFF00
#AEFF00
#A5FF00
#98FF00
#8CFF00
#7FFF00
#72FF00
#65FF00
#59FF00
#4CFF00
#3FFF00
#32FF00
#26FF00
#19FF00
*/
