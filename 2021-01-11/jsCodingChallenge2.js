var johnM1, johnM2, johnM3, mikeM1, mikeM2, mikeM3, fibiM1, fibiM2, fibiM3;
johnM1 = 89;
johnM2 = 120;
johnM3 = 103;
mikeM1 = 116;
mikeM2 = 94;
mikeM3 = 123;
fibiM1 = 97;
fibiM2 = 134;
fibiM3 = 105;
var avgJ = (johnM1 + johnM2 + johnM3) / 3;
var avgM = (mikeM1 + mikeM2 + mikeM3) / 3;
var avgF = (fibiM1 + fibiM2 + fibiM3) / 3;
if (avgJ > avgM && avgJ > avgF) {
    console.log("John is the winner");

} else if (avgM > avgJ && avgM > avgF) {
    console.log("mike is the winner");
} else if (avgF > avgJ && avgF > avgM) {
    console.log("fibi is the winner");
}
else {
    console.log("draw");
}
