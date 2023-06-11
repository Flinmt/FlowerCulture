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


