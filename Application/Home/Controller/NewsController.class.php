<?php
namespace Home\Controller;
use Home\Controller;
class NewsController extends CommonController {

    public function index(){
        $this->_showDisplay();
        $this->display();
    }

    private function _showDisplay(){
        $db = M('Article');
        //公司新闻文章列表
        $cid = I('cid','','int');

        if($cid){
            $where = array(
                'cid' => I('cid','','int'),
            );
        }else{
            $where['cid'] = array(
                'in',
                array(31,32,33,34)
            );
        }


        //翻页
        $count = $db->where($where)->count();
        $page = getpage($count , 4);
        $limit_value = $page->firstRow . "," . $page->listRows;

        $news = $db->where($where)->limit($limit_value)->order('addtime desc')->select();
        $this->cid = $cid;
        $this->show = $page->show();
        $this->result = $news;
    }

    public function showNews(){
        $id = I('get.id','','int');
        $info = M('Article')->where(array('id'=>$id))->find();

        $this->cid = $info['cid'];
        $this->info = $info;
        $this->display();
    }

//    public function knowledge(){
//        $db = M('Article');
//        //海洋知识文章列表
//        $where = array(
//            'cid' => 31,
//        );
//        //翻页
//        $count = $db->where($where)->count();
//        $page = getpage($count , 4);
//        $limit_value = $page->firstRow . "," . $page->listRows;
//
//        $knowledge = $db->where($where)->limit($limit_value)->order('addtime desc')->select();
//        $this->show = $page->show();
//
//        $this->result = $knowledge;
//        $this->display();
//    }
//
//    public function dynamic(){
//        $db = M('Article');
//        //行业动态文章列表
//        $where = array(
//            'cid' => 33,
//        );
//        //翻页
//        $count = $db->where($where)->count();
//        $page = getpage($count , 4);
//        $limit_value = $page->firstRow . "," . $page->listRows;
//
//        $dynamic = $db->where($where)->limit($limit_value)->order('addtime desc')->select();
//        $this->show = $page->show();
//
//        $this->result = $dynamic;
//        $this->display();
//    }
//
//    public function activity(){
//        $db = M('Article');
//        //活动公告文章列表
//        $where = array(
//            'cid' => 34,
//        );
//        $count = $db->where($where)->count();
//        $page = getpage($count , 4);
//        $limit_value = $page->firstRow . "," . $page->listRows;
//
//        $activity = $db->where($where)->limit($limit_value)->order('addtime desc')->select();
//        $this->show = $page->show();
//
//        $this->result = $activity;
//        $this->display();
//    }
//


}