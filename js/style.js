let khoAnh = [];
const nAnh = 1;
let index = 0;

for (let i = 1; i < nAnh; i++) {
    khoAnh[i] = new Image();
    khoAnh[i].src = `img/${i}.jpg`;

}

function previous() {
    index--;
    if (index < 0) {
        index = nAnh - 1;
    }
    document.getElementById("anh").src = khoAnh[index].src;
}

function next() {
    index++;
    if (index >= nAnh) {
        index = 0;
    }
    document.getElementById("anh").src = khoAnh[index].src;
}

function first() {
    index = 0;
    document.getElementById("anh").src = khoAnh[index].src;
}

function last() {
    index = nAnh - 1;
    document.getElementById("anh").src = khoAnh[index].src;
}
// setInterval("next()", 3000);

// function myFunction() {
//     var x = document.getElementById("myTopnav");
//     if (x.className === "topnav") {
//         x.className += " responsive";
//     } else {
//         x.className = "topnav";
//     }
// }