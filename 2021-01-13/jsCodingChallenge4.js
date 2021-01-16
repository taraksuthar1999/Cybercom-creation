var mark = {
    name: "mark",
    mass: 65,
    height: 1.8,
    calBmi: function () {
        this.Bmi = this.mass / (this.height * this.height);
    }
};
var john = {
    name: "john",
    mass: 60,
    height: 2.1,
    calBmi: function () {
        this.Bmi = this.mass / (this.height * this.height);
    }
};
mark.calBmi();
john.calBmi();
if (mark.Bmi > john.Bmi) {
    console.log(mark);

} else if (mark.Bmi = john.Bmi) {
    console.log("both have same BMI");

} else {
    console.log(john);
}
