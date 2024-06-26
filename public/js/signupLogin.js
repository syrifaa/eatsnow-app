const validasiEmail = (email) => {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return String(email).match(regex);
};

const validasiUsername = (username) => {
    const regex = /^[a-zA-Z0-9.-]{1,255}$/;
    return String(username).match(regex);
};

const validasiPassword = (password) => {
    const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    return String(password).match(regex);
};

const cekEmail = () => {
    const email = document.getElementsByName("email")[0].value;
    if (!validasiEmail(email)) {
        document.getElementById("email").style.border = "1px solid red";
        document.getElementById("emailError").innerHTML = "Email not valid";
    }
    else{
        document.getElementById("email").style.border = "none";
        document.getElementById("emailError").innerHTML = "";
    }
    cekAll();
}

const cekUsername = () => {
    const username = document.getElementsByName("name")[0].value;
    if (username.length == 0){
        document.getElementById("name").style.border = "none";
        document.getElementById("nameError").innerHTML = "";
    }
    else if (!validasiUsername(username)) {
        document.getElementById("name").style.border = "1px solid red";
        document.getElementById("nameError").innerHTML = "Username only use letters, periods, and dashes";
    }
    else{
        document.getElementById("name").style.border = "none";
        document.getElementById("nameError").innerHTML = "";
    }
    cekAll();
}

const cekPassword = () => {
    const password = document.getElementsByName("password")[0].value;
    if (password.length == 0){
        document.getElementById("password").style.border = "none";
        document.getElementById("passwordError").innerHTML = "";
    }
    else if (password.length < 8) {
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById("passwordError").innerHTML = "Password must have 8 characters";
    }
    else if (!validasiPassword(password)) {
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById("passwordError").innerHTML = "Must have uppercase letter, lowercase letter & number";
    }
    else{
        document.getElementById("password").style.border = "none";
        document.getElementById("passwordError").innerHTML = "";
    }
    cekAll();
}

const cekAll = () => {

    if(document.getElementById("email").style.border == "none" && document.getElementById("name").style.border == "none" && document.getElementById("password").style.border == "none"){
        document.getElementById("submit").disabled = false;
    }
    else{
        document.getElementById("submit").disabled = true;
    }

    if(document.getElementById("email").style.border == "none" && document.getElementById("password").style.border == "none"){
        document.getElementById("submit-login").disabled = false;
    }
    else{
        document.getElementById("submit").disabled = true;
    }
}