<?php
class notFoundController extends controllerHelper{
    public function index(){
        $data = array();
        $data['css'] = 'home.css';
        $data['js'] = 'home.js';
        $data['title'] = 'Ooops, página não encontrada!';

        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $this->loadTemplateLogged('notfound', $data);
        }else{  
            $this->loadTemplateNotLogged('notfound', $data);
        }
    }
}