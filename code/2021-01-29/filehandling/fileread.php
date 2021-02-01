<?php
if(isset($_POST['name'])){
    $name = $_POST['name'];
    if(!empty($_POST['name'])){
        $handle = fopen('name1.txt','a');
        fwrite($handle, $name."\n");
        fclose($handle);
        $count = 1;
        $readin = file('name1.txt');// file function read line by line
        $readin_count = count($readin);
        foreach($readin as $fname){
            echo trim($fname);
            if($count<$readin_count){
                echo ',';
            }
            $count++;
        }
    }else{
        echo 'please enter data';
    }
}

?>
<form action="fileread.php" method="post">
<input type="text" name = "name"><br><br>
<input type="submit" value="Submit">
</form>