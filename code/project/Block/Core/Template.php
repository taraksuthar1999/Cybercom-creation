<?php
namespace Block\Core;

class Template
{
    protected $children = [];
    protected $template = null;
    protected $controller = null;
    protected $request = null;
    protected $url = null;
    public function __construct()
    {
        $this->setUrl();
        $this->setRequest();
    }
    public function setController(\Controller\Core\Admin $controller)
    {
        $this->controller = $controller;
        return $this;

    }
    public function getController()
    {
        return $this->controller;
    }
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;

    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function toHtml()
    {
        ob_start();
        require_once $this->getTemplate();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
   /* public function getUrl($actionName = null, $controllerName = null, $params = [], $reset = false)
    {
        return $this->getController()->getUrl($actionName, $controllerName, $params, $reset);
    }*/
    public function prepareChildren($key, $value)
    {
        $this->addChild($key, $value);
    }

    public function getChildren()
    {
        if (!$this->children) {
            return false;
        }
        return $this->children;
    }
    public function setChildren(array $children = [])
    {
        $this->children = $children;
    }
    public function addChild($key, $value)
    {
        $this->children[$key] = $value;
    }
    public function removeChild($key)
    {
        unset($this->$children[$key]);
    }
    public function getChild($key)
    {
        return $this->children[$key];
    }
    public function createBlock($className)
    {
        return \Mage::getBlock($className);
    }
    public function getMessage()
    {
        return \Mage::getBlock('Model\Admin\Message');
    }
    public function setRequest($request = null)
    {
        if (!$request) {
            $request = \Mage::getModel('Model\Core\Request');
        }
        $this->request = $request;
        return $this;
    }
    public function getRequest()
    {

        return $this->request;
    }
    public function setUrl($url = null)
    {
        if (!$url) {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url = $url;
        return $this;
    }
    public function getUrl()
    {

        return $this->url;
    }
    public function baseUrl($subUrl = null)
    {
        return $this->getUrl()->baseUrl($subUrl);
    }


}