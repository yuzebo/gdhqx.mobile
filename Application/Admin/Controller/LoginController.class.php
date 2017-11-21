<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class LoginController extends Controller {
    public function index()
    {
        //echo "__ROOT__/Admin/Index/index";
        if($_SESSION){
            $this->redirect('Admin/Index/index', '',3,"用户已登入");
        }
//        if($_POST['remember'] == 1){
//            $this->username=isset($_COOKIE["username"])?$_COOKIE["username"]:"";
//        }
        //echo md5('admin');
        $this->display();
    }

    public function login()
    {
        if(!IS_POST){
            $this->error('页面不存在');
        }
        //header('Content-Type:text/heml;Charset=UTF-8');
       //提取表单内容

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //账号密码admin admin
        $where = array('username'=>$username);

        $user = M('User')->where($where)->find();
        if(!$user || $user['password'] != $password){
            $this->error("用户名或密码错误");
        }
        //登入成功 写入session 跳转首页
        session('uid',$user['id']);
        session('username',$username);
        session(C('USER_AUTH_KEY'),$user['id']);
        if($_SESSION['username'] == C('RBAC_SUPERADMIN')){
            session(C('ADMIN_AUTH_KEY'),true);
        }

        //处理自动登入
        if (isset($_POST['remember'])){
            $account = $user['username'];
            $ip = get_client_ip();
            $value = $account . '|' . $ip;
            $value =encryption($value);
            @setcookie('remember', $value, C('AUTO_LOGIN_TIME'),'/');
        }
        //RBAC
        Rbac::saveAccessList();

        $this->redirect('Admin/Index/index', '',3,"登入成功，正在跳转");
       // var_dump($user);
    }


}