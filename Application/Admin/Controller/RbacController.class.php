<?php
namespace Admin\Controller;
use Think\Controller;
use My\Tree;

class RbacController extends CommonController {

    public function addRole(){
        $this->display("addRole");
    }
    //添加角色表单处理
    public function addRoleHandle(){
        if(M('Role')->add($_POST)){
            $this->success("添加成功" ,U('rbac/addRole'));
        }
    }

    //角色管理(角色列表)
    public function roleList(){
        $this->role=M('Role')->order('id')->select();
        $this->display("roleList");
        //echo __ROOT__;
    }

    //添加权限(节点)
    public function addNode(){
        $node = M('Node')->where('level!=3')->order('sort')->select();
        $this->node = $node;//就这样分配  或者 $this->assgin();
        $this->display("addNode");
    }
    //添加节点表单处理
    public function addNodeHandle(){
        $node = M('Node');
        if($node->add($_POST)){
            $this->success('添加成功' ,U('rbac/nodeList'));
        }
    }

    public function nodeList(){

        $node = M('Node')->order('sort')->select();
        $this->node=Tree::create($node);
        $this->display("nodeList");
    }

    //删除权限
     public function deleteNode(){
            if(M('Node')->where('id='.I('id','',int))->delete()){
                $this->success('删除成功',U('rbac/nodeList'));
            }
    }

    public function addUser(){
        $this->role=M('Role')->select();
        $this->display("addUser");
    }


    public function addUserHandle(){
        $data['username'] = I('username');
        $data['password'] = md5(I('password'));
        $data['logintime'] = time();
        $data['loginip'] = get_client_ip();
        $data['status'] = 1;
        $uid = M('User')->add($data);
        if($uid){
            //插入role_user表
            $role['role_id'] = I('role_id',int);
            $role['user_id'] =$uid;
            M('Role_user')->add($role);
            $this->success('添加成功',U('rbac/adduser'));
        }else{
            $this->error('添加失败');
        }
    }

    public function userList(){
        $this->user = D('User')->field('password',true)->relation(true)->order('id')->select();
        $this->display("userList");
    }

    public function acceess(){
        $rid=I('rid','',int);
        $node1 = M('Node')->order('sort')->select();
        //$this->node = Tree::create($node);

        $data = array();//$data用于存放最新数组，里面包含每个当前用户是否有每一个权限
        $access = M('Access');
        foreach($node1 as $value){
            $where=array(
                'role_id'=>$rid,
                'node_id'=>$value['id']
            );
            $count = $access->where($where)->count();
            if($count){
                $value['access'] = 1;
            }
            else{
                $value['access'] = 0;
            }
            $data[] = $value;
        }


        $this->nodelist = Tree::create($data);
       // dd($this->nodelist);exit;
        $this->rid = $rid;
        $this->name = M('Role')->getFieldById($rid,'name');
        $this->display();

    }

    //添加角色-权限表（节点表）
    public function setAccess(){
        $rid = I('rid','',int);
        $where = array(
            'role_id' =>$rid,
        );
        $access = M('Access');
        $access->where($where)->delete();//清空当前权限

        if(isset($_POST['access'])){
            $data = array();
            foreach($_POST['access'] as $value){
                $tmp = explode('_',$value);

                $data[]=array(
                    'role_id'=>$rid,
                    'node_id'=>$tmp[0],
                    'level'=>$tmp[1],
                );
            }
            if($access->addAll($data)){
                $this->success('修改成功',U('rbac/addrole'));
            }else{
                $this->error('修改失败');
            }
        }else{
            $this->error('修改失败');
        }
    }
}