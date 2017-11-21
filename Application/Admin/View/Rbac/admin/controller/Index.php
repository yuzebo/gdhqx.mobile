<?php
namespace app\admin\controller;
use \think\Cookie;
use \think\Controller;
use think\Db;
class Index extends Controller
{
	public function index()
	{
		if(!Cookie::has('id','user_'))
		{
			$this->redirect('Login/login');
		}
        $db = Db::table('chief_msgs');
        $data = $db->order('create_time')->select();

//        $db2 = Db::table('console_msgs');
//        $data2 = $db2->order('time')->select();
//        $this->assign('console',$data2);
		return $this->fetch('index',['message'=>$data]);
	}

	public function addUser(){

    }

    public function stopAdmin(){

    }


}