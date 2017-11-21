<?php
namespace Home\Controller;
use Think\Controller;
use My\Category;
class FiveController extends CommonController{
    public function index(){
        $this->display();
    }

   public function object(){
       $this->_showDisplay();
       $this->display();
   }

   private function _showDisplay(){
       $cid = I('get.cid', '', 'int');
       $db = M('Article');
       $cate = M('cate')->order('sort')->select();
       $list = Category::getChildId($cate,$cid);
       if($list){
           $where = array();
           $where['cid'] = array('in',$list);
       }else{
           $where = array(
               'cid'=>$cid,
           );
       }

       $count = $db->where($where)->count();
       $page = getpage($count , 4);
       $limit_value = $page->firstRow . "," . $page->listRows;

       $news = $db->where($where)->limit($limit_value)->order('addtime desc')->select();

       $this->cid = $cid;
       $this->show = $page->show();
       $this->result = $news;
   }

    public function showFive(){
        $id = I('get.id','','int');
        $info = M('Article')->where(array('id'=>$id))->find();

        $cid_child = $info['cid'];
        $where = array('id' => $cid_child);
        $cate = M('cate')->where($where)->find();

        $this->cid = $cate['pid'];
        $this->info = $info;
        $this->display();
    }

}