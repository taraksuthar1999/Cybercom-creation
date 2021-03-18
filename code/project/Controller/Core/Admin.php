<?php
namespace Controller\Core;

class Admin
{
    protected $request = null;
    protected $session = null;
    protected $Message = null;
    protected $layout = null;

    public function __construct()
    {
        $this->setSession();
        $this->setRequest();
    }/*
    public function renderLayout()
    {
        echo getLayout()->toHtml();
    }
    public function setLayout()
    {
        $this->layout = Mage::getBlock('Block_Core_Layout');
        return $this;
    }
    public function getLayout()
    {
        if (!$this->layout) {
            $this->setLayout();
        }
        return $this->layout;
    }*/
    public function setSession()
    {
        $this->session = \Mage::getModel('Model\Admin\Session');
        return $this;
    }
    public function getSession()
    {
        if (!$this->session) {
            $this->setSession();
        }
        return $this->session;
    }

    public function setMessage()
    {
        $this->Message = \Mage::getModel('Model\Admin\Message');

        return $this;
    }
    public function getMessage()
    {
        if (!$this->Message) {
            $this->setMessage();
        }
        return $this->Message;
    }
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');

        return $this;
    }
    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
    public function redirect($actionName = null, $controllerName = null, $params = null, $resetParams = false)
    {

        header("location:" . $this->getUrl($actionName, $controllerName, $params, $resetParams));
        exit();
    }
    public function getUrl($actionName = null, $controllerName = null, $params = null, $resetParams = false)
    {
        $final = $_GET;

        if ($resetParams) {
            $final = [];
        }
        if (empty(trim($actionName))) {
            $actionName = $_GET['a'];
        }
        if (empty(trim($controllerName))) {
            $controllerName = $_GET['c'];
        }

        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        if (is_array($params)) {
            $final = array_merge($final, $params);
        }

        $queryString = http_build_query($final);
        unset($final);




        return "http://localhost:8080/projects/project/index.php?{$queryString}";

    }

}
?>