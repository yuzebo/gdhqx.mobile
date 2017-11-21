<?php

namespace Admin\Controller;
use Think\Controller;

class ExitController extends CommonController
{
    public function index(){
        session_unset();
        session_destroy();
        $this->redirect('Login/index');
    }
}