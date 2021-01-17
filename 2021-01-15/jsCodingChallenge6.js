var a = 0;
var b = 1;
var c;
console.log(a);
console.log(b);
for (i = 0; i < 10; i++) {
    c = a + b;
    a = b;
    b = c;
    console.log(c);
}