<?php
//to check 1.does it exist or is it submitted 2.is it empty 3.display back to user
if(isset($_GET['day'])&&isset($_GET['date'])&&isset($_GET['year'])){
    $day = $_GET['day'];
    $date = $_GET['date'];
    $year = $_GET['year'];
    if(!empty($day)&&!empty($date)&&!empty($year)){
        echo 'it is day '.$day.' date '.$date.' year '.$year;

    }else{
        echo 'fill all the details';
    }
}

?>
<form action="getRequest.php" method="GET">
Day: <br><input type="text" name="day"><br>
Date: <br><input type="text" name="date"><br>
year: <br><input type="text" name="year"><br><br>
<input type="submit" value="Submit">

</form>