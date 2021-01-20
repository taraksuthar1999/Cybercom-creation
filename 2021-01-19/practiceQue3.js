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
console.log("before sort");
var msg = array.forEach(x => {//iterating using foreach function
    console.log(`${x.name}`);

});
var sort = array.sort((a, b) => {//using sort method for sorting purpose
    return a.age - b.age;
});
console.log("after sort");
var msg1 = array.map(x => {//iterating using map function
    console.log(x.name);
})




