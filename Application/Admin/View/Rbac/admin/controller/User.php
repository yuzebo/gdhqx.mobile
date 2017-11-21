<?php

namespace app\admin\controller;
use think\Cookie;
use think\Controller;
use think\Db;

class User extends Controller{
    public function addUser(){
        return $this->fetch();
    }

    public function addUserHandle(){
        $account = $_POST['account'];
        $psw = md5($_POST['psw']);
        $repsw = md5($_POST['repsw']);
        $status = 1;
        $db = Db::table('sys_user');
        $select = $db->where('account',$account)->select();

        $data = array(
            'account'=>$account,
            'psw'=>$psw,
            'status'=>$status,
            'veriify'=>'',
            'role_lv'=>''
        );

        if(!Cookie::has('account')!='admin'){
            $this->error('没有权限');
        }
        if($psw != $repsw){
            $this->error('确认密码不正确');
        }
        if($select){
            $this->error('此用户已存在');
        }
        //$add = Db::table('sys_user')->data($data)->save();
        $list = $db->insert($data);
        if(!$list){
            $this->error('添加失败');
        }else{
            $this->success('添加成功','Admin/Index/index');
        }
    }

    public function updateUser($id){
        $db = Db::table('sys_user');
        $data = $db->where(['id'=>$id])->find();
        return $this->fetch('updateUser',['data'=>$data]);
    }

    public function updateUserHandle($id){
        $db = Db::table('sys_user');
        $name = input('account');

    }


}