<?php
namespace Model\Core;

class Url
{
    public function getUrl($actionName = null, $controllerName = null, $params = null, $resetParams = false)
    {
        $final = $_GET;
       /* $final = [
            'c' => null,
            'a' => null,

        ];*/
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
       
        
       /* $final['c'] = $controllerName;
        $final['a'] = $actionName;
        $final['id'] = $id;*/

        return "http://localhost:8080/projects/project/index.php?{$queryString}";

    }
    public function baseUrl($subUrl = null)
    {
        return "http://localhost:8080/projects/project/{$subUrl}";
    }
}
?>