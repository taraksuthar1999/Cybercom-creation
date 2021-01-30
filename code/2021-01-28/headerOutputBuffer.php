<?php
    ob_start();//it stores the output to be displayed
?>
<h1>My Page</h1>
welcome guys
<?php
    $redirect_page = 'http://google.co.in';
    $redirect = false;
    if($redirect)header('Location: '.$redirect_page);
    ob_end_flush();//it flushes the output from buffer but displays the output
    //ob_end_clean();//it cleans the buffer the displays nothing
?>