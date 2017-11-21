<?php
namespace app\admin\controller;
use \think\Cookie;
use \think\Controller;
use think\Db;
class Login extends Controller
{
	public function login()
	{
		return $this->fetch();
	}
    //登入
	public function loginHandle(){
        var_dump(md5('admin'));
        $account = $_POST['account'];
        $psw = md5($_POST['psw']);
        $user = Db::table('sys_user')->where('account',$account)->find();
        $user_id = $user['id'];
        $user_account = $user['account'];
        if(!$user || $user['psw'] != $psw){
            $this->error("用户名或密码错误");
        }

        // 初始化
        cookie(['prefix' => 'user_', 'expire' => 3600]);
        // 设置
        cookie('id', "$user_id", 3600);
        cookie('account', "$user_account", 3600);
        // 获取
        //cookie('user_account');
        $this->redirect('Index/index');
    }

    //注销
    public function logout(){
        cookie(null, 'user_');
        $this->redirect('Login/login');
    }


    public function updatePsw(){
	    return $this->fetch();
    }

    public function updatePswHandle(){
       // var_dump($_POST);exit;
        $account = $_POST['account'];
        $psw = md5($_POST['psw']);
        $repsw = md5($_POST['psw']);
        $select = Db::table('sys_user')->where('account',$account)->select();

        if(!Cookie::has('account')!='admin'){
            $this->error('没有权限');
        }
        if($psw != $repsw){
            $this->error('确认密码不正确');
        }
        if(!$select){
            $this->error('没有此用户');
        }
        if(request()->isPost()){
            $res = Db::table('sys_user')->where('account',$account)->update(['psw'=>$psw]);
            if(!$res){
                $this->error('修改失败');
            }else{
                $this->success('修改成功','Login/login');
            }
        }
    }
}