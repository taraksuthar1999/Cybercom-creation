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
var msg = array.map(myFunction);
function myFunction(x) {
    console.log(x.name);
    return "<tr> <td>" + x.name + "</td> <td>" + x.age + "</td> <td>" + x.email + "</td> <td>" + x.telephone + "</td></tr>";
}
var msg1 = array.map(x => {
    return x.name;
});
console.log(msg1);
document.getElementById("tb").innerHTML = msg;

