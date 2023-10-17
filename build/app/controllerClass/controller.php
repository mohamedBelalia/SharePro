<?php

class Controller{

    function runAction($actionName){
        $actionName .= "Action";

        if(method_exists($this,$actionName)){
            $this->$actionName();
        }
        else{
            include("../notFond/404.php");
        }
    }
}

?>