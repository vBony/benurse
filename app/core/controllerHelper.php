<?php
class controllerHelper{
    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        require 'app/views/'.$viewName.'.php';
    }

    public function loadTemplateNotLogged($viewName, $viewData = array()){
        extract ($viewData);
        require 'app/views/template_not_logged.php';
    }

    public function loadTemplateLogged($viewName, $viewData = array()){
        extract ($viewData);
        require 'app/views/template_logged.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()){
        extract($viewData);
        require 'app/views/'.$viewName.'.php';
    }
}

?>