<?php
require 'connectdatabase.php';
?>
<form action="select.php" method="get">
<select name="uh" id="uh">
<option value="u">unhealty</option>
<option value="h">healthy</option>
</select><br><br>
<input type="submit" value="Submit">
</form>

<?php
if(isset($_GET['uh'])&&!empty($_GET['uh'])){
    $uh = $_GET['uh'];


$query = "SElECT `food`,`calories` FROM `food` WHERE `healthy_unhealthy`='$uh' ORDER BY `id` DESC";
if($query_run = mysqli_query($conn,$query)){
    //echo 'success';
    if(mysqli_num_rows($query_run)==NULL){
        echo 'no results found';
    }else{
        while($row = mysqli_fetch_assoc($query_run)){
            $food = $row['food'];
            $calories = $row['calories'];
            echo $food.' has '.$calories.' calories<br>';
        }
    }
}else{
    echo mysqli_error($conn);//to display the error
}
}

?>