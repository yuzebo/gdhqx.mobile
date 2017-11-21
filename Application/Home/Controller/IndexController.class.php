<?php
namespace Home\Controller;
use Think\Controller;
use My\Category;
class IndexController extends CommonController {
    public function index()
    {
       //新闻资讯轮播
        $db = M('Article');
        $where = array(
            'cid' => 32
        );
        $this->left = $db->where($where)->limit(6)->order('id desc')->select();
        $this->result = $db->where($where)->limit(8)->order('id desc')->select();

        //五大领域下拉以及首页公司新闻
        $db = M('brief');
        $info = $db->select();

        foreach ($info as $k => $v){
            $content[] = htmlspecialchars_decode($v['content']);
        }

        $this->info = $content;
        $this->display();
    }
    //首页显示新闻
    public function showNews(){
        $id = I('get.id','','int');
        $info = M('Article')->where(array('id'=>$id))->find();

        $this->cid = $info['cid'];
        $this->info = $info;
        $this->display();
    }

}