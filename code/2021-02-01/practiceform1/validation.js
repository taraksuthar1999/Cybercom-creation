
function validate(id) {

    var name = document.getElementById(id);
    if (!name.value) {
        console.log("enter your name");
        document.getElementById(id + "Err").style.display = "block";
        name.focus();
    } else {

        document.getElementById(id + "Err").style.display = "none";

    }
}
function onSubmit() {

    var name = document.getElementById("name");
    var password = document.getElementById("password");
    var address = document.getElementById("address");
    var age = document.getElementById("age");
    var checkbox = validChk("checkbox[]");
    var checkgender = validChk("gender[]");
    // console.log(checkbox, checkgender);
    var flag = 0;
    if (!name.value) {
        validate("name");
        flag = 1;
    }
    if (!password.value) {
        validate("password");
        flag = 1;
    }
    if (!address.value) {
        validate("address");
        flag = 1;
    }
    if (!checkbox) {
        document.getElementById("checkboxErr").style.display = "block";
        flag = 1;
    }
    if (!checkgender) {
        document.getElementById("genderErr").style.display = "block";
        flag = 1;
    }
    if (!age.value) {
        validate("age");
        flag = 1;
    }
    if (!file.value) {
        validate("file");
        flag = 1;
    }

    if (flag == 1) {
        return false;
    }
    console.log(flag);
    return true;




}

function validChk(name) {
    var chkBox = document.getElementsByName(name);
    var lenChkBox = chkBox.length;
    //alert(lenChkBox)
    var valid = 0;
    for (var i = 0; i < lenChkBox; i++) {
        if (chkBox[i].checked == true) {
            valid = 1;
            break;
        }
    }
    if (valid == 0) {

        return false;
    }
    document.getElementById("checkboxErr").style.display = "none";
    return true;
}