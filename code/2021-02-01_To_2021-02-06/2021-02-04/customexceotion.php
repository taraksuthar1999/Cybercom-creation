<?php
class ServerException extends Exception{}
class DatabaseException extends Exception{}

try{
    if(!$conn = @mysqli_connect('localhost','root','')){
        throw new ServerException('could not connect to server');

    }else if(!mysqli_select_db($conn,'phppractice')){
        throw new DatabaseException('Could not connect to database');

    }else{
        echo 'connected';
    }

}catch(ServerException $e){
    echo $e->getMessage();

}catch(DatabaseException $e){
    echo $e->getMessage();
}

?>

