// Newsletter

function newsLetterClose() {
    document.getElementById("newsletter").style.display = "none";
}


// Login

function showLogin() {
    document.getElementById("Login").style.display = "block";
}
function closeLogin() {
    document.getElementById("Login").style.display = "none";
}

var showRegistered = false;

async function showRegister() {

    if (showRegistered == false) {
        document.getElementById("logged").style.transform = "translate(50%, -50%)";
        await esperar(500);
        document.getElementById("logged").style.zIndex = "1";
        document.getElementById("logged").style.transform = "translate(-50%, -50%)";
        showRegistered = true;

    } else {
        document.getElementById("logged").style.transform = "translate(50%, -50%)";
        await esperar(500);
        document.getElementById("logged").style.zIndex = "3";
        document.getElementById("logged").style.transform = "translate(-50%, -50%)";
        showRegistered = false;
    }

}
// Basket

var hide = true;

function basketShowHide() {
    if (hide == true) {
        document.getElementById("basket").style.transform = "translateX(0%)";
        hide = false;
    } else {
        document.getElementById("basket").style.transform = "translateX(115%)"
        hide = true;
    }
}

// More Products

const esperar = async (miliseconds) => {
    await new Promise(resolve => {
        return setTimeout(resolve, miliseconds)
    });
}

var show = false;

async function productsShowHide() {
    if (show == false) {
        document.getElementById("more").style.display = "block";
        document.getElementById("all").innerHTML = "Hide products";
        await esperar(200);
        document.getElementById("more").style.transform = "translateX(0%)";
        show = true;
    } else {
        document.getElementById("more").style.transform = "translateX(-110%)";
        await esperar(800);
        document.getElementById("more").style.display = "none";
        document.getElementById("all").innerHTML = "View all products";
        show = false;
    }
}


