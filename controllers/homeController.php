<?php
class homeController extends controllerHelper{
    public function index(){
        $data = array();
        $this->loadTemplate('home', $data);
    }
}

?>