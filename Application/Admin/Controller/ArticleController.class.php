<?php
namespace Admin\Controller;
use My\Category;
use My\Tree;
use Think\Page;
class ArticleController extends CommonController {

//    //博文列表
//    public function index(){
//
//        $action_name = ACTION_NAME;
//        $where = array(
//            'name' => $action_name,
//        );
//        $db = M('Node');
//        $info = $db->field('id,title')->where($where)->find();
//        $id = $info['id'];
//        $node = $db->select();
//
//        $breadcrumb = Category::getParents($node,$id);
//        $this->display();
//    }

    //获取node pid


    //添加博文
    public function addArticle(){
        $cate = M('cate')->order('sort')->select();
        $this->cate=Tree::create($cate);
      //var_dump($this->cate);
        $this->display('addArticle');
    }
    //添加博文表单处理
    public function addArticleHandle(){
        //dd( $_POST);exit;
        $article['title'] = I('title','','htmlspecialchars');
        $article['content']  = I('content','','htmlspecialchars');
        $article['cid']  = I('cid','','htmlspecialchars');
        $article['uid'] = $_SESSION['uid'];
        $article['username'] = $_SESSION['username'];
        $article['max'] = I('max','','htmlspecialchars');
        $article['medium'] = I('medium','','htmlspecialchars');
        $article['author'] = I('author','','htmlspecialchars');
        $article['brief'] = I('brief','','htmlspecialchars');
        if(I('addtime', '','htmlspecialchars')){
            $article['addtime'] = strtotime(I('addtime', '','htmlspecialchars'));
        }else{
            $article['addtime']  = time();
        }


        $article_id = M('Article')->add($article);

        if($article_id){
            $data['article_id'] = $article_id;
            $data['user_id'] = $article['uid'];
            M('article_user')->add($data);
            $this->success('文章添加成功',U('article/articleList'));
        }else{
            $this->error('文章添加失败');
        }
    }
    //编辑器上图片处理
//    public function upload(){
//        $upload = new Think\Upload();
//        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');//上传格式
//        //$upload->rootPath  = './Uploads/'; // 设置附件上传根目录
//        $upload->savePath = "./Uploads/";// 设置附件上传子目录
//        $info = $upload->upload();
//        $info['addtime'] = date('Y-m-d',time());
//
//        $json = json_encode($info);
//        echo $json; exit;
//
//        {
//            "file": {
//            "name": "20170719142346.png",
//        "type": "image/png",
//        "size": 371019,
//        "key": "file",
//        "ext": "png",
//        "md5": "a97d65c84540d8812ddb68f9712920f9",
//        "sha1": "93d47646e926d88cd17dd4252b0cdf0752023290",
//        "savename": "598ad379f0163.png",
//        "savepath": "./Uploads/2017-08-09/"
//    }

//}
    public function getpage($count, $pagesize = 10)
    {
        $p = new Page($count, $pagesize);
//        $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $p->setConfig('prev', '<');

        $p->setConfig('next', '>');
        $p->setConfig('last', '>>');
        $p->setConfig('first', '<<');
//        $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
//        $p->lastSuffix = false;//最后一页不显示为总页数
        return $p;
    }

//    public function selectArticle(){
//
//$cid = I('cid');
//        $cate = D('cate')->select();
//        $m = D('Article');
//        $limitRows = 10;
//
//        //找出cid的子节点
//        $list = Category::getChildId($cate,$cid);
//        if($list){
//            $where = array();
//            $where['cid'] = array('in',$list);
//        }else{
//            $where = array(
//                'cid'=>$cid,
//            );
//        }
//        $count = $m->where($where)->count();
//        $p = $this->getpage($count,$limitRows);
//        $this->page = $p->show();
//
//        //查找文章
//        $res = $m->where($where)->order('addtime desc')->limit($p->firstRow, $p->listRows)->select();
//
//        //ajax 返回的内容
//        $str = '';
//        $str1 ='';
//        foreach($res as $k => $v){
//            $update_url = U('Article/updateArticle',array('article_id'=>$v['id']));
//            $delete_url = U('Article/deleteArticle',array('article_id'=>$v['id']));
//
//            $where = array(
//              'id'=>$v['cid'],
//            );
//            $cate = M('cate')->where($where)->select();
//            $str .= '<tr>';
//            $str .= "<td>".$v['id']."</td>";
//            $str.= "<td>".$v['title']."</td>";
//            $str.= "<td>".$v['content']."</td>";
//            $str.= "<td>".date("Y-m-d H:i:s",$v['addtime'])."</td>";
//            $str.= "<td>".$cate[0]['title']."</td>";
//            $str.= "<td>".$v['username']."</td>";
//            $str.= "<td>";
//            $str.= '<a href="'.$update_url.'"><i class="icon-pencil"></i></a>';
//            $str.= '<a href="'.$delete_url.'"><i class="icon-remove"></i></a>';
//            $str.="</tr>";
//        }
//        $str1.='<div class="pagination">';
//        $str1.="<ul>";
//        $str1.='<li><div class="pages" id="article">'. $this->page .'</div></li>';
//        $str1.="</ul>";
//        $str1.="</div>";
////        <div class="pagination">
////                    <ul>
////                        <li><div class="pages" id="article">{$page}</div></li>
////                    </ul>
////                </div>
//        echo json_encode(array('str'=>$str,'str1'=>$str1)) ;
//    }


   public function articleList(){
        //$this->article = D('Article')->relation(true)->select();
        $cid = $_GET['cid'];
        if(!$cid){
            $cid = 1;
        }
        $m = D('Article');
        $limitRows = 10;
        //找出cid的子节点
        $cate = M('cate')->order('sort')->select();
        $list = Category::getChildId($cate,$cid);
        if($list){
            $where = array();
            $where['cid'] = array('in',$list);
        }else{
            $where = array(
                'cid'=>$cid,
            );
            //dd($where);die;
        }
        $count = $m->where($where)->count();
        $p = $this->getpage($count,$limitRows);
        $limit_value = $p->firstRow . "," . $p->listRows;

        $this->cate = Tree::create($cate);
        $this->article = $m->relation(true)->where($where)->field(true)->order('addtime desc')->limit($limit_value)->select();

        $this->assign('select', $this->article); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出

        $this->display("articleList");
   }

   public function brief(){

       $db = M('brief');
       $info = $db->select();

       $this->brief = $info;
       $this->display();
   }

   public function updateBrief(){

       $this->id = I('brief_id','','int');
       $this->update = M('Brief')->where('id='.I('brief_id','',int))->select();
       $this->display('updateBrief');
   }

   public function updateBriefHandle(){
       $brief = M('Brief');
       $data['name'] = I('name', '' ,'htmlspecialchars');
       $data['content'] = I('content', '' ,'htmlspecialchars');

       $update_id = $brief->where('id='.I('brief_id','',int))->save($data);
       if($update_id){
           $this->success('修改成功',U('article/brief'));
       }else{
           $this->error('修改失败');
       }
   }


    public function updateArticle(){
        $cate = M('cate')->order('sort')->select();

        $this->update = M('Article')->where('id='.I('article_id','',int))->select();
        //dd($this->update);
        $this->article = M('Article');
        $this->cate = Tree::create($cate);
        $this->id = I('article_id','',int);
        $this->display("updateArticle");
    }

    public function updateArticleHandle(){
        $article = M('Article');
        $data['title'] = I('title','','htmlspecialchars');
        $data['content']  = I('content','','htmlspecialchars');
        $data['cid']  = I('cid','','htmlspecialchars');
        $data['addtime'] = time();
        $data['username'] = $_SESSION['username'];
        $data['max'] = I('max','','htmlspecialchars');
        $data['medium'] = I('medium','','htmlspecialchars');
        $data['author'] = I('author','','htmlspecialchars');
        $data['brief'] = I('brief','','htmlspecialchars');
        if(I('addtime', '','htmlspecialchars')){
            $data['addtime'] = strtotime(I('addtime', '','htmlspecialchars'));
        }else{
            $data['addtime']  = time();
        }

        //var_dump(I('article_id','',int));exit;
        $update_id = $article->where('id='.I('article_id','',int))->save($data);
        //var_dump($update_id);exit;
        if($update_id){
            $this->success('修改成功',U('article/articleList'));
        }else{
            $this->error('修改失败');
        }

    }


    public function addCate(){
        $cate = M('Cate')->order('sort')->select();
        $cate=Tree::create($cate);
        $this->cate = $cate;
        $this->display("addCate");
    }

    public function deleteArticle(){
        if(M('Article')->where('id='.I('article_id','',int))->delete()){
            $this->success('删除成功',U('Article/articleList'));
        }
    }

    public function addCateHandle(){
        $cate = M('Cate');
        if($cate->add($_POST)){
            $this->success('添加成功' ,U('article/addCate'));
        }
    }

    public function cateList(){
        $cate = M('cate')->order('sort')->select();
        $this->cate=Tree::create($cate);
        $this->display("cateList");
    }

    public function select(){
        $select = M("Article")->where(I('cid'))->select();
        echo json_encode($select);exit;
    }


    public function preview(){
        $_POST['content'] = htmlspecialchars_decode($_POST['content']);
        $time = time();
        $_POST['time'] = date('Y-m-d H:i:s',$time);
        echo json_encode($_POST);
    }

}
?>