<?php

class Model_Core_Message extends Model_Core_Session
{
    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }
    public function getSuccess($message)
    {
        return $this->success;
    }

}
?>