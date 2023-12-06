function togglePW() {
    //toggle password visibility

    document.querySelector(".eye").classList.toggle("slash");

    //show/hide the password

    var password = document.querySelector("[name=password]");

    if (password.getAttribute("type") === "password") {
        password.setAttribute("type", "text");
    } else {
        password.setAttribute("type", "password");
    }
}
