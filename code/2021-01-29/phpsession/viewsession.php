<?Php
session_start();

if(isset($_SESSION['username'])||isset($_SESSION['age'])){
    echo 'welcome '.$_SESSION['username'].' age '.$_SESSION['age'];
}else{
    echo 'please log in';
}
?>