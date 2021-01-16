function tipCalculator(n) {
    if (n < 50) {
        return n * 0.2;
    } else if (n >= 50 && n <= 200) {
        return n * 0.15;

    } else {
        return n * 0.1;

    }
}
var tips = new Array();
var totalBill = new Array();
tips[0] = tipCalculator(124);
tips[1] = tipCalculator(48);
tips[2] = tipCalculator(268);
totalBill[0] = tips[0] + 124;
totalBill[1] = tips[1] + 48;
totalBill[2] = tips[2] + 268;
console.log(tips);
console.log(totalBill);
