var admin = [];
function checkAdmin() {
    if (localStorage.getItem('admin')) {
        alert("Already Registered..");
        window.location.href = "Login.html";
    }
}

function registerAdmin() {
    var adminObj = {};
    adminObj.name = document.getElementById("name").value;
    adminObj.email = document.getElementById("email").value;
    adminObj.password = document.getElementById("password").value;
    adminObj.city = document.getElementById("selectCity").value;
    adminObj.state = document.getElementById("selectState").value;
    admin.push(adminObj);
    localStorage.setItem("admin", JSON.stringify(admin));//stores data on local storage
    window.location.href = "Login.html";
}