var User = [];

function addUser() {
    if (localStorage.getItem('user')) {
        User = JSON.parse(localStorage.getItem('user'));
    }
    var userObj = {};
    userObj.name = document.getElementById("name").value;
    userObj.email = document.getElementById("email").value;
    userObj.password = document.getElementById("password").value;
    userObj.birthdate = document.getElementById("Birthdate").value;
    User.push(userObj);
    localStorage.setItem("user", JSON.stringify(User));
}
function displayUserData() {
    console.log(User)


    if (localStorage.getItem('user')) {
        User = JSON.parse(localStorage.getItem('user'));
    }
    if (User === []) {
        console.log("if");
        document.getElementById("displaytable").innerHTML = "<tr><td>No User Found</td></tr>";


    }
    else {
        console.log("else");
        for (var i = 0; i < User.length; i++) {
            document.getElementById("displaytable").innerHTML = "<tr><td>" + User[i].name + "</td><td>" + User[i].email + "</td><td>" + User[i].password + "</td><td>" + User[i].birthdate + "</td></tr>";

        }

    }

}