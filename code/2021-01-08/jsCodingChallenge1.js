var markHeight = 2.2;
var markmass = 65;
var johnHeight = 2.5;
var johnmass = 60;
console.log("marks's mass:" + markmass + " and height: " + markHeight);
console.log("john's mass:" + johnmass + " and height: " + johnHeight);
bmimark = markmass / (markHeight * markHeight);
bmijohn = johnmass / (johnHeight * johnHeight);
var comparison = bmimark > bmijohn;
console.log("Is Mark's Body mass Index(BMI) heigher than john's? " + comparison);
