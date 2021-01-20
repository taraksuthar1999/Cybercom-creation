var array = [{
    "name": "john",
    "age": "22",
    "email": "john@.com",
    "telephone": "666666"
},
{
    "name": "mike",
    "age": "23",
    "email": "mike@.com",
    "telephone": "666677"
},
{
    "name": "lara",
    "age": "21",
    "email": "lara@.com",
    "telephone": "226666"
}
]

var msg = function () {
    for (x in array) {
        // console.log(array[x]);
        localStorage.setItem('person' + x, JSON.stringify(array[x]));

    }
};
msg();
var personStr0 = localStorage.getItem('person0');
var personObj0 = JSON.parse(personStr0);
var personStr1 = localStorage.getItem('person1');
var personObj1 = JSON.parse(personStr1);
var personStr2 = localStorage.getItem('person2');
var personObj2 = JSON.parse(personStr2);

document.getElementById("tb").innerHTML = "<tr> <td>" + personObj0.name + "</td> <td>" + personObj0.age + "</td> <td>" + personObj0.email + "</td> <td>" + personObj0.telephone + "</td></tr><tr> <td>" + personObj1.name + "</td> <td>" + personObj1.age + "</td> <td>" + personObj1.email + "</td> <td>" + personObj1.telephone + "</td></tr><tr> <td>" + personObj2.name + "</td> <td>" + personObj2.age + "</td> <td>" + personObj2.email + "</td> <td>" + personObj2.telephone + "</td></tr>";




// for without local storage
/*
var msg = array.map(myFunction);
function myFunction(x) {
    console.log(x.name);
    return "<tr> <td>" + x.name + "</td> <td>" + x.age + "</td> <td>" + x.email + "</td> <td>" + x.telephone + "</td></tr>";
}
var msg1 = array.map(x => {
    return x.name;
});
console.log(msg1);
document.getElementById("tb").innerHTML = msg;*/

