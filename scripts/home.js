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
        document.getElementById("basket").style.transform = "translateX(110%)"
        hide = true;
    }
}
