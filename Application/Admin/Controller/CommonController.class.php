<?php
namespace  Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
use Think\UploadFile;
use My\Category;
class CommonController extends Controller{
    public function _initialize(){
        //判断是否自动登入
        if(isset($_COOKIE['remember']) && !isset($_SESSION['uid'])) {
            $value = explode('|', encryption($_COOKIE['remember'], 1));
            $ip = get_client_ip();

            if ($ip == $value[1]) {
                $username = $value[0];
                $where = array(
                    'username' => $username,
                );
                $user = M('User')->where($where)->field('id')->find();

                session(C('USER_AUTH_KEY'),$user['id']);
                session('username',$username);
                if($username == C('RBAC_SUPERADMIN')){
                    session(C('ADMIN_AUTH_KEY'),true);
                }
                if ($user){
                    session('uid', $user['id']);
                }
            }
        }

        //判断用户是否已经登入
        if(!isset($_SESSION['uid'])){
            redirect(U('Login/index'));
        }
        //RBAC认证
        $notAuth = in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
        if(C('USER_AUTH_ON') && !$notAuth){
            if(!Rbac::AccessDecision()){

                //  echo MODULE_NAME.'-'.ACTION_NAME.'没有权限';
            }else{
                //echo MODULE_NAME.'-'.ACTION_NAME.'有权限';
            }
        }

    $this->_getAccess();
    $this->getNode();
    $this->getBreadcrumb();
    }

    private function _getAccess(){
        if (session(C('ADMIN_AUTH_KEY'))){
            $where = array(
                'level' => 2,
            );
            $node = D('Node')->where($where)->order('sort')->relation(true)->select();
        }else{
            $where = array(
                'level' => 2,
            );
            $node = D('Node')->where($where)->order('sort')->relation(true)->select();

            //取出登入用户的模块权限 和操作权限
            $module = '';
            $node_id='';
            $accessList = $_SESSION['_ACCESS_LIST'];

            foreach ($accessList as $key=>$value){

                foreach ($value as $key1=>$value1){
                    $module = $module.','.$key1;

                    foreach ($value1 as $key2=>$value2){
                        $node_id = $node_id.','.$value2;
                    }
                }
            }
            //去除没有权限的节点
            foreach ($node as $key=>$value){

                $module1 = explode(',',$module);
                //dd($module);
                if(!in_array(strtoupper($value['name']),$module1)){
                    //dd($value['name']);
                    //dd($module);
                    unset($node[$key]);
                }else{
                    //模块存在，比较里面的方法
                    foreach ($value['node'] as $key1=>$value1){
                        if(!in_array($value1['id'],explode(',',$node_id))){
                            unset($node[$key]['node'][$key1]);
                        }
                    }
                }
            }
        }
        $this->assign('node1',$node);
       // dd($node);
    }

    public function uploadFace(){
        if(!IS_POST){
            $this->error('页面不存在');
        }
        $upload = $this->_upload('Face', '600,300,50', '400,200,50');
        echo json_encode($upload);die;
    }



    //图片上传处理
    private function _upload($path, $width, $height){
        $upload = new UploadFile();// 实例化上传类
        // dd($upload);
        $upload->maxSize = 30000000 ;// 设置附件上传大小  C('UPLOAD_SIZE');
        $upload->savePath = './Uploads/' . $path . '/'; // 设置附件上传目录
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->saveRule = 'uniqid';
        $upload->uploadReplace = true; //是否存在同名文件是否覆盖

        $upload->thumb = true; //是否对上传文件进行缩略图处理
        $upload->thumbMaxWidth = $width; //缩略图处理宽度
        $upload->thumbMaxHeight = $height; //缩略图处理高度
        $upload->thumbPrefix = 'max_,medium_,mini_';  //生产2张缩略图
        $upload->thumbPath = $upload->savePath . date('Y_m_d') . '/'; //缩略图保存路径

        $upload->thumbRemoveOrigin = true; //上传图片后删除原图片
        $upload->autoSub = true; //是否使用子目录保存图片
        $upload->subType = 'date'; //子目录保存规则
        $upload->dateFormat = 'Y_m_d'; //子目录保存规则为date时时间格式


        if (!$upload->upload()) {
            // 上传错误提示错误信息
            return array(
                'status' => 0,
                'msg' => $upload->getErrorMsg()
            );
        } else {
            // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
            $pic = explode('/',$info[0]['savename']);
            return array(
                'status' => 1,
                'path' => array(
                    'max' => $pic[0] . '/max_' . $pic[1],
                    'medium' => $pic[0] . '/medium_' . $pic[1],
                    'mini' => $pic[0] . '/mini_' . $pic[1]
                )
            );
        }
    }

    //获取当前标题
    public function getNode(){
        $action_name = ACTION_NAME;
        $where = array(
            'name' => $action_name,
        );
        $db = M('Node');
        $this->info = $db->field('id,title')->where($where)->find();
    }

    //获取面包屑
    public function getBreadcrumb(){
        $action_name = ACTION_NAME;
        $where = array(
            'name' => $action_name,
        );
        $db = M('Node');
        $info = $db->field('id,title')->where($where)->find();
        $id = $info['id'];
        $node = $db->select();

        $this->breadcrumb = Category::getParents($node,$id);
       // dd($this->breadcrumb);die;
        
    }


}