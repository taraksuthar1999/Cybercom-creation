<?php
namespace Controller\Core;



class Front
{
    public static function init()
    {
        $request = \Mage::getModel('Model\Core\Request');
        $actionName = $request->getActionName() . 'Action';
        $controllerName = ucfirst($request->getControllerName());

        $controllerName = \Mage::prepareClassName('Controller', $controllerName);
        
        //$controllerName = 'Controller_' . $controllerName;
        $controller = \Mage::getController($controllerName);
        $controller->$actionName();
    }
}
?>