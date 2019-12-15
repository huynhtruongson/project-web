function showPassword() {
    var p = document.getElementById("mPassword")
    if(p.getAttribute("type")==="password") {
        p.setAttribute("type","text");
    }
    else {
        p.setAttribute("type","password");
    }
}