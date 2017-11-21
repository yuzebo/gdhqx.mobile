<?php
namespace Home\Controller;

class IntroController extends CommonController{

    public function intro(){
        $this->_showDisplay();
        $this->display();
    }

    private function _showDisplay(){
        $cid = I('get.cid' ,'' ,'int' );
        $where = array(
            'cid' => $cid
        );

        $this->cid = $cid;
        $this->info = M('Article')->where($where)->find();
    }
}