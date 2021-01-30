<?php
$input_data ='';
$find = array('alex','billy','dale');
$replace = array('a**x','b***y','d**e');
if(isset($_POST['input_data'])&&!empty($_POST['input_data'])){
    $input_data = $_POST['input_data'];
   // $newinput_data = str_replace($find,$replace,$input_data);//this function is case sensitive  thus wont work if the case is different 
   $newinput_data = str_ireplace($find,$replace,$input_data);// using ireplace mehtod which is case insensitive
    echo $newinput_data;
}
?>
<hr>
<form action="wordCensoring.php" method='POST'>
    <textarea name="input_data" id="input_data" cols="30" rows="10"><?php echo $input_data; ?></textarea><br><br>
    <input type="submit" value="submit">
</form>