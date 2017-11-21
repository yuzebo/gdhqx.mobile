<?php
namespace Home\Controller;
use Think\Controller;
use My\Category;
class CommonController extends Controller {
    public function _initialize(){
        //面包屑
        $cid = I('get.cid', '', 'int');
        $node = M('cate')->select();
        $this->breadcrumb = Category::getParents($node,$cid);

        //获取controller名称
        $this->controller_name = CONTROLLER_NAME;

        //判断是否手机登入
        if(isMobile()){
//            C('DEFAULT_MODULE','Mobile');
            redirect(U('Mobile/Index/index'));
        }
    }
}