<?php
namespace Home\Controller;
use Think\Controller;

class CaseController extends CommonController{
    public function index(){
        $this->_showDisplay();
        $this->display();
    }

    private function _showDisplay(){
//        $cid = I('get.cid' ,'' ,'int');
//        $where = array('cid' => $cid);
        //翻页

//        $where['cid'] = array(
//            'in',
//            array(36,37,38,39,40,41)
//        );
        $db = M('Article');
        $cid = I('cid', '', 'int');
        if(I('cid','','int')){
            $where = array(
                'cid' => $cid,
            );
        }else{
            $where['cid'] = array(
                'in',
                array(36,37,38,39,40,41)
            );
        }
        $count = $db->where($where)->count();
        $page = getpage($count , 8);
        $limit_value = $page->firstRow . "," . $page->listRows;

        $this->cid = $cid;
        $this->show = $page->show();
        $this->result = $db->where($where)->limit($limit_value)->order('id desc')->select();
    }

    public function showCase(){
        $id = I('get.id','','int');
        $this->cid= I('get.cid' ,'' ,'int');
        $info = M('Article')->where(array('id'=>$id))->find();
        $this->info = $info;
        $this->display();
    }
}