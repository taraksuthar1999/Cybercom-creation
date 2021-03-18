<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Admin\Session');

class Message extends \Model\Admin\Session
{
    public function __construct()
    {
        parent::__construct();
    }
    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }
    public function getSuccess()
    {
        if (!$this->success) {
            return null;

        }
        return $this->success;
    }
    public function setFailure($message)
    {
        $this->failure = $message;
        return $this;
    }
    public function getFailure()
    {
        if (!$this->failure) {
            return null;

        }
        return $this->failure;
    }
    public function setNotice($message)
    {
        $this->notice = $message;
        return $this;
    }
    public function getNotice()
    {
        if (!$this->notice) {
            return null;

        }
        return $this->notice;
    }
    public function clearSuccess()
    {
        unset($this->success);
    }
    public function clearFailure()
    {
        unset($this->failure);
    }
    public function clearNotice()
    {
        unset($this->notice);
    }

}
?>