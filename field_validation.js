function myFunction() {
    console.log("function called");
    var txt = "";
    if (document.getElementById("name_id").validity.valid) {
        txt = "name correct";
    } else {
        txt = "name field empty";
    }
    document.getElementById("error").innerHTML = txt;
}
